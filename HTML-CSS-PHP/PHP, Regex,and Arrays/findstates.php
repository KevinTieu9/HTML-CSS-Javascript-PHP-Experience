<!DOCTYPE html>

<!--
Kevin Tieu
Homework 4
-->
<html>
<body>

<?php


//function array to count the number of states in the array
//minus the initial of any recursive array.
function count_recursive($array) 
{
    if (!is_array($array)) {
       return 1;
    }

    $count = 0;
    foreach($array as $sub_array) {
        $count += count_recursive($sub_array);
    }

    return $count;
}

//function that flattens array
function array_flatten($array) { 
  if (!is_array($array)) { 
    return FALSE; 
  } 
  $result = array(); 
  foreach ($array as $key => $value) { 
    if (is_array($value)) { 
      $result = array_merge($result, array_flatten($value)); 
    } 
    else { 
      $result[$key] = $value; 
    } 
  } 
  return $result; 
} 


//Array for the states
$states = [
"California",
"Georgia",
"Indiana",
"Louisiana",
"Minnesota",
"Texas",
"Virginia"
];

//push elements to the array that ends with nia or starts with G

echo "Array lookup for states that ends with nia or starts with G\n";
$statesArray1= [];
array_push($statesArray1, preg_grep("/nia/i", $states));
array_push($statesArray1, preg_grep("/^G/i", $states));


//Flatten Array 1 to be merged, and make easier to find elements
$statesArray1 = array_flatten($statesArray1);

//$statesArray1[0] = preg_grep("/nia/i", $states); // California and Virginia
//$statesArray1[1] = preg_grep("/^G/", $states) and preg_grep("/a$/", $states); // Georgia
print_r($statesArray1); // California and Virginia in array 0, Georgia in array 1


//array #2
$statesArray2 = [ 
"West Virginia", 
"North Carolina", 
"South Carolina",
"New York",
"New Mexico",
"New Jersey"
];


//Merge Array1 with Array 2
$statesArray2 = array_merge($statesArray1, $statesArray2);


//Output the number of States in Array 2, by counting recrusively of statesArray 2
//should output as int(9). StatesArray1 has 2 states in it: California, Virginia, and Georgia.
//combined with the 6 in statesArray2, it should add up to 9
echo "Total number of states in States Array #2 = ", var_dump(count_recursive($statesArray2));
print "\n";

echo "Array looking for all elements that start with N or ends with nia\n";

$statesArrayNia = [];
foreach($statesArray2 as $sub_array) {
  if (preg_match("/^N|nia$/i", $sub_array)){
    array_push($statesArrayNia, $sub_array);
  }
}
print_r($statesArrayNia);

?>

</body>
</html>
