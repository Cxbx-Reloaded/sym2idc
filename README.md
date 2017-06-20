#sym2idc

A quick and dirty PHP script to convert Dxbx symbol cache files (.sym) to IDC scripts for IDA Pro.

## Usage
`php -f sym2idc.php [infile] > [outfile]`

In IDA Pro, go to `File => IDC Script` and Select the output file of this tool
 
## Example
 `php -f sym2idc.php "FFFE0000_4C0590E3_Xbox OnlineDash.sym" > "FFFE0000_4C0590E3_Xbox OnlineDash.sym"`
 
 An example input and output is included in this repository. 
 

