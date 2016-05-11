    <div class="item col-sm-12">

 <table>
<tr>
<th>Image</th>
<th>Name</th>

<th>Date</th>
<th>Teaser</th>
<th>Link</th>
</tr>

<% loop $AllChildren %>

      <tr>

<td>
$Photo.CroppedImage(150,150)
</td>

<td>
<h4>$Title</h4>
</td>

<td>
$Date
</td>

<td>
	<% if $Teaser %>
		<p>$Teaser</p>
	<% else %>
		<p> $Content.FirstSentence </p>
	<% end_if %>

</td>


<td>
<div> <a href="$Link">Read More &raquo; </a> </div>
</td>


</tr>







    <% end_loop %>


</table>
    </div>
