<?php
    function list_folders($user,$key){
        $url ="https://nethunt.com/api/v1/zapier/triggers/readable-folder";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD,"$user:$key");
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json'] ); 
        $result = curl_exec($ch); 
        curl_close($ch);
    }
    function list_permission_folders($user,$key){
        $url ="https://nethunt.com/api/v1/zapier/triggers/writable-folder";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD,"$user:$key");
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json'] ); 
        $result = curl_exec($ch); 
        curl_close($ch);
    }
    function list_fields($user,$key,$folder){
        $url ="https://nethunt.com/api/v1/zapier/triggers/folder-field/$folder";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD,"$user:$key");
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json'] ); 
        $result = curl_exec($ch); 
        curl_close($ch);
    }
    function query_search($user,$key,$folder,$field,$query,$limit){
        $url ="https://nethunt.com/api/v1/zapier/searches/find-record/$folder?query=$field%3A$query&limit=$limit";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD,"$user:$key");
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json'] ); 
        $result = curl_exec($ch); 
        curl_close($ch);
    }
    function recent_records($user,$key,$folder,$date,$limit){
        $url ="https://nethunt.com/api/v1/zapier/triggers/new-record/$folder?since=$date"."T00%3A00%3A00.000Z&limit=$limit";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD,"$user:$key");
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json'] ); 
        $result = curl_exec($ch); 
        curl_close($ch);
    }
    function recent_comments($user,$key,$folder,$date,$limit){
        $url ="https://nethunt.com/api/v1/zapier/triggers/new-comment/$folder?since=$date"."T00%3A00%3A00.000Z&limit=$limit";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD,"$user:$key");
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json'] ); 
        $result = curl_exec($ch); 
        curl_close($ch);
    }
    function recent_call_logs($user,$key,$folder,$date,$limit){
        $url ="https://nethunt.com/api/v1/zapier/triggers/new-call-log/$folder?since=$date"."T00%3A00%3A00.000Z&limit=$limit";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD,"$user:$key");
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json'] ); 
        $result = curl_exec($ch); 
        curl_close($ch);
    }
    function recent_drive_files($user,$key,$folder,$date,$limit){
        $url ="https://nethunt.com/api/v1/zapier/triggers/new-gdrivefile/$folder?since=$date"."T00%3A00%3A00.000Z&limit=$limit";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD,"$user:$key");
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json'] ); 
        $result = curl_exec($ch); 
        curl_close($ch);
    }
    function recently_updated($user,$key,$folder,$fields,$date,$limit){
        $all_fields="";
        foreach ($fields as $field){
            $field=str_replace(" ","%20",$field);
            $all_fields=$all_fields."fieldName=$field&";
        }
        $url ="https://nethunt.com/api/v1/zapier/triggers/updated-record/$folder?$all_fields"."since=$date"."T00%3A00%3A00.000Z&limit=$limit";
        echo "$url";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD,"$user:$key");
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json'] ); 
        $result = curl_exec($ch); 
        curl_close($ch);
    }
    function recent_updates($user,$key,$folder,$fields,$date,$limit,$recordid){
        $all_fields="";
        foreach ($fields as $field){
            $field=str_replace(" ","%20",$field);
            $all_fields=$all_fields."fieldName=$field&";
        }
        if ($recordid=="0"){
            $url ="https://nethunt.com/api/v1/zapier/triggers/record-change/$folder?$all_fields"."since=$date"."T00%3A00%3A00.000Z&limit=$limit";
        }else{
            $url ="https://nethunt.com/api/v1/zapier/triggers/record-change/$folder?recordId=$recordid&$all_fields"."since=$date"."T00%3A00%3A00.000Z&limit=$limit";
        }
        echo "$url";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD,"$user:$key");
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json'] ); 
        $result = curl_exec($ch); 
        curl_close($ch);
    }
    function create_comment($user,$key,$recordid,$data){
        $url ="https://nethunt.com/api/v1/zapier/actions/create-comment/$recordid";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD,"$user:$key");
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json'] ); 
        $result = curl_exec($ch); 
        curl_close($ch);
    }
    function create_call_log($user,$key,$recordid,$data){
        $url ="https://nethunt.com/api/v1/zapier/actions/create-call-log/$recordid";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD,"$user:$key");
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json'] ); 
        $result = curl_exec($ch); 
        curl_close($ch);
    }
    function create_record($user,$key,$folder,$data){
        $url ="https://nethunt.com/api/v1/zapier/actions/create-record/$folder";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD,"$user:$key");
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json'] ); 
        $result = curl_exec($ch); 
        curl_close($ch);
    }
    function update_record($user,$key,$recordid,$data){
        $url ="https://nethunt.com/api/v1/zapier/actions/update-record/$recordid";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD,"$user:$key");
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json'] ); 
        $result = curl_exec($ch); 
        curl_close($ch);
    }
    function link_thread($user,$key,$recordid,$data){
        $url ="https://nethunt.com/api/v1/zapier/actions/link-gmail-thread/$recordid";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD,"$user:$key");
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json'] ); 
        $result = curl_exec($ch); 
        curl_close($ch);
    }
    function ver_creds($user,$key){
        $url ="https://nethunt.com/api/v1/zapier/triggers/auth-test";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD,"$user:$key");
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json'] ); 
        $result = curl_exec($ch); 
        curl_close($ch);
    }
?> 