<?php

echo '<tr><td><div class="pagination">';
if ($paged > 1)
{
	echo '<a class="first" href="?page=post-icons&pag=1">&laquo;</a>';
}
else
{
	echo '<span class="first">&laquo;</span>';
}
for ($p = 1; $p <= $num_pages; $p++)
{
	echo '';
	if ($paged == $p)
	{
		echo ' <span class="current">' . $p . '</span>';
	}
	else
	{
		echo ' <a href="?page=post-icons&pag=' . $p . '">' . $p . '</a>';
	}
}

if ($paged < $num_pages)
{
	echo ' <a class="last" href="?page=post-icons&pag=' . $num_pages . '">&raquo;</a>';
}
else
{
	echo ' <span class="last">&raquo;</span>';
}

echo '</div></td></tr>';