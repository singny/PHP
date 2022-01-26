    public function update_clob($TableName, $ColumnName, $mWhere, $value, $ALinkID = null)
    {
        if (!isset($TableName) || !trim($TableName))
            return 0;
        if (!isset($ColumnName) || !trim($ColumnName))
            return 0;
        if (!isset($mWhere) || !trim($mWhere))
            return 0;

        if ($ALinkID) {
            $LinkID = $ALinkID;
        } else {
            $LinkID = $this->Link_ID;
        }
        if (!is_resource($LinkID)) {
            $LinkID = $this->connect();
        }

        $len = 0;
        $clob_bind_name = "clob_{$ColumnName}";
        if (isset($value)) {
            $len = strlen($value);
        }
        /*
        $stmt = oci_parse($LinkID, "select rowid from $TableName WHERE $mWhere");
        $rowid = oci_new_descriptor($conn, OCI_D_ROWID);
        oci_define_by_name($stmt, "ROWID", $rowid);
        oci_execute($stmt);
        */

        $sql = "UPDATE {$TableName} SET {$ColumnName} = EMPTY_CLOB() WHERE {$mWhere} RETURNING {$ColumnName} INTO :{$clob_bind_name}";
        $stmt = oci_parse($LinkID, $sql);
        $clob = oci_new_descriptor($LinkID, OCI_D_LOB);
        oci_bind_by_name($stmt, ":{$clob_bind_name}", $clob, -1, OCI_B_CLOB);
        oci_execute($stmt, OCI_DEFAULT);
        if ($clob->save($value)) {        
            $clob->free();
            return $LinkID;
        } else {
            echo "실패";
        }
    }
