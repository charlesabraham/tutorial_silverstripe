<body>





<div class="container">

<h1> $Title </h1>

<div class="breadcrumb" />  $Breadcrumbs </div>


<div class="main col-sm-9" />  $Content 





<h1 class="section-title">Recent Players</h1>
<div class="grid-style1">

<table>
<tr><th>Firstname</th><th>Lastname</th><th>Number</th><th>Birthday</th></tr>

  <% loop $LatestPlayers(5) %>
   <tr>
<td>
$FirstName
</td>
<td>
$LastName
</td>

<td>
$PlayerNumber
</td>
<td>
$Birthday
</td>
</tr>
    <% end_loop %>
</table>
</div>

<% loop $FeaturedProperties %>
<div class="item col-md-4">
    <div class="image">
        <a href="$Link">
            <h3>$Title</h3>
            <span class="location">$Region.Title</span>
        </a>
        $PrimaryPhoto.CroppedImage(220,194)
    </div>
    <div class="price">
        <span>$PricePerNight.Nice</span><p>per night<p>
    </div>
    <ul class="amenities">
        <li><i class="icon-bedrooms"></i> $Bedrooms</li>
        <li><i class="icon-bathrooms"></i> $Bathrooms</li>
    </ul>
</div>
<% end_loop %>


<div class="forms"> $Form </div>

</div>

<div class="main col-sm-3" />  SLIDE SHOW HERE </div>
</div>
  </body>
