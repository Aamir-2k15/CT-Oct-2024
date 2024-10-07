<?php
/**
 * Format a string by stripping off characters from the start and end, then
 * replacing dashes and underscores with spaces and capitalizing each word.
 *
 * @param string $inputString The string to format
 * @param string $stripFromStart The characters to strip from the start of the string
 * @param string $stripFromEnd The characters to strip from the end of the string
 * @return string The formatted string
 */
function formatAndStrip($inputString, $stripFromStart = '', $stripFromEnd = '') {
    // Strip off from the start and end
    $formattedString = $inputString;
    if ($stripFromStart !== '') {
        $formattedString = preg_replace('/^' . preg_quote($stripFromStart, '/') . '/', '', $formattedString);
    }
    if ($stripFromEnd !== '') {
        $formattedString = preg_replace('/' . preg_quote($stripFromEnd, '/') . '$/', '', $formattedString);
    }

    // Replace dashes and underscores with spaces, then capitalize each word
    $formattedString = ucwords(str_replace(['-', '_'], ' ', $formattedString));

    return $formattedString;
}



/**
 * Display debugging information in a formatted HTML block.
 *
 * @param mixed $data The data to be displayed.
 * @param mixed $exit (optional) If set, the function will exit after displaying the data.
 * @throws None
 * @return None
 */

 function pd($data, $exit = null)
 {
 ?>
     <div class="row my-4" style="z-index:99999;">
         <pre>TESTING MODE</pre>
         <pre>
         <?php print_r($data); ?> 
     </pre>
     </div>
     <?php
     if (isset($exit)) {
         exit;
     }
 }
 
 