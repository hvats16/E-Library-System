<?php
include "../config.php";
include "index.php";
	echo"<form action='deletesubcat1.php' method='get'>";
		echo"<table border=0 align=center class='BorderOfTable'>";
			echo"<tr>";
				echo"<td class=bigboldblack> Category name</td>";
				echo"<td><input type='text' class='buttonwhitecomb' name='txtnm' value=".$_GET['type']."></td>";
				echo"<td><input type='text' class='buttonwhitecomb' name='txtnm' value=".$_GET['name']."></td>";
				echo"<input type='hidden' name='id' value=".$_GET['id'].">";
			echo"</tr>";
			echo"<tr>";
				echo"<td colspan=2 align=center class=buttonblack><input type='submit' class='buttongreen' name='buttonok' value=' Delete '</td>";
			echo"</tr>";	
		echo"</table>";
	echo"</form>";
?>
							</td>
						</tr>
						<tr>
							<td colspan='3'>&nbsp;</td>
						</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</html>