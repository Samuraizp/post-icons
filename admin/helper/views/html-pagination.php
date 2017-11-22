<?php

echo '<tr><td><div class="pagination">
                        <td>';
if ($paged > 1)
{
	echo '<a class="first" href="?page=post-icons&pag=1">&laquo;</a>';
}
else
{
	echo '<span class="first">&laquo;</span>';
}
echo '</td><td>';
for ($p = 1; $p <= $num_pages; $p++)
{
	echo '</td><td>';
	if ($paged == $p)
	{
		echo '<span class="current">' . $p . '</span>';
	}
	else
	{
		echo '<a href="?page=post-icons&pag=' . $p . '">' . $p . '</a>';
	}
}
echo '</td><td>';
if ($paged < $num_pages)
{
	echo '<a class="last" href="?page=post-icons&pag=' . $num_pages . '">&raquo;</a>';
}
else
{
	echo '<span class="last">&raquo;</span>';
}
echo '</td>';
echo '</div></td></tr>';