<?php
    $suggest = array("suggest_from","suggest_to","title", "description", "contacts", "name", "price","region");
    function barter_topics()
    {
        $topics = new mysqli("barter", "root", "", "main");

        if ($topics->connect_errno) {
            //TODO: Handling the connection error
            exit();
        }

        $query = "SELECT * FROM topics";
        $result = $topics->query($query);

        $row = $result->fetch_all(MYSQLI_ASSOC);
        foreach ($row as &$value)
            echo("<option value=".$value[id].">".$value[name]."</option>");
        unset($value);
        $topics->close();
  }

  function region_selection()
  {
      $region = new mysqli("barter","root","","main");

      if ($region->connect_errno)
      {
          //TODO: Handling the connection error
          exit();
      }

      $query = "SELECT * FROM regions";
      $result = $region->query($query);
      $row = $result->fetch_all(MYSQL_ASSOC);
      foreach ($row as &$val)
          echo ("<option value=".$val[id].">".$val[name]."</option>");
      unset($val);
      $region->close();
  }

?>