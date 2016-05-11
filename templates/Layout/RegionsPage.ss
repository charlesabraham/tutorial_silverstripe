<body>


<div class="container">

<h1> $Title </h1>

<div class=”breadcrumb” />  $Breadcrumbs </div>


<div style="display:none">

<% base_tag %>
<% loop $Menu(1) %>
  <li><a class="$LinkingMode" href="$Link" title="Go to the $Title page">$MenuTitle</a></li>
<% end_loop %>

</div>

<div class="main col-sm-12" />  $Content </div>



<div class="main col-sm-12" />

<% if $Menu(2) %>
  <h3>In this section</h3>
    <ul class="subnav">  
      <% loop $Menu(2) %>
        <li><a class="$LinkingMode" href="$Link">$MenuTitle</a></li>
      <% end_loop %>
    </ul>
<% end_if %>


<div class="grid-style1 clearfix">
   <% loop $Regions %>
<div class="item col-sm-3"><!-- Set width to 4 columns for grid view mode only -->
    <div class="image image-large">
        <a href="$Link">
            <span class="btn btn-default"><i class="fa fa-file-o"></i> Read More</span>
        </a>
        $Photo.CroppedImage(248,500)
    </div>
    <div class="info-blog">
        <h3>
            <a href="$Link">$Title</a>
        </h3>
        <p>$Description.LimitCharacters(40)</p>
    </div>
</div>
<% end_loop %>
</div>




</div>



<div class="forms"> $Form </div>
</div>
  </body>
