

<body>


<div class="container">

<h1> $Title </h1>

<div class="breadcrumb" />  $Breadcrumbs </div>


<div class="main col-sm-9" />


<% with $Region %>
        <div class="blog-main-image">
            $Photo.SetWidth(450,450)
        </div>
        $Description
    <% end_with %>

</div>

<div class="sidebar gray col-sm-3">
    <h2 class="section-title">Regions</h2>
    <ul class="categories subnav">
        <% loop $Regions %>
            <li class="$LinkingMode"><a class="$LinkingMode" href="$Link">$Title</a></li>
        <% end_loop %>
    </ul>
</div>
  </body>
