<?php
 function user_sort($a, $b) {
    // smarts is all-important, so sort it first
    if($b == 'smarts') 
        return 1;
    
    else if($a == 'smarts') 
        return -1;
    

    return ($a == $b) ? 0 : (($a < $b) ? -1 : 1);
 }

 $values = array('name' => 'Buzz Lightyear',
                 'email_address' => 'buzz@starcommand.gal',
                 'age' => 32,
                 'smarts' => 'some');
  
  $original_values = $values;

 if(isset($_POST['submitted'])) {
    $sort_type = $_POST['sort_type'];
    if($sort_type === 'sort')
      sort($values);

    else if($sort_type === 'rsort')
      rsort($values);

    else if($sort_type === 'usort')
      usort($values, 'user_sort');

    else if($sort_type === 'ksort')
      ksort($values);
      
    else if($sort_type === 'krsort')
      krsort($values);

    else if($sort_type === 'uksort')
      uksort($values,'user_sort');

    else if($sort_type === 'asort')
      asort($values);

    else if($sort_type === 'arsort')
      arsort($values);

    else
        uasort($values, 'user_sort');
    
    }
?>

<form action="UserSorting.php" method="post">
 <p>
   <input type="radio" name="sort_type" value="sort" checked="checked" /> Standard sort<br />
   <input type="radio" name="sort_type" value="rsort" />   Reverse sort<br />
   <input type="radio" name="sort_type" value="usort" />   User-defined sort<br />
   <input type="radio" name="sort_type" value="ksort" />   Key sort<br />
   <input type="radio" name="sort_type" value="krsort" />  Reverse key sort<br />
   <input type="radio" name="sort_type" value="uksort" />  User-defined key sort<br />
   <input type="radio" name="sort_type" value="asort" />  Value sort<br />
   <input type="radio" name="sort_type" value="arsort" /> Reverse value sort<br />
   <input type="radio" name="sort_type" value="uasort" /> User-defined value sort<br />
   <input type="submit" value="Sort" name="submitted" />
 </p>
   
<?php 

  echo '<p>Values unsorted(before sort): </p>';
  echo '<ul>';
  foreach($original_values as $key=>$value) {
      echo "<li><b>$key</b>: $value</li>";
  }
  echo '</ul>'; 

  if(isset($_POST['sort_type']) ){
    echo '<p>Values sorted by '. $_POST['sort_type']. ': </p>';
    echo '<ul>';
    foreach($values as $key=>$value) {
      echo "<li><b>$key</b>: $value</li>";
    }
    echo '</ul>';
  }

?>

</form>
