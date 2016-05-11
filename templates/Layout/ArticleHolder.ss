<body>





<div style="display:none">
<% base_tag %>
<% loop $Menu(1) %>
  <li><a class="$LinkingMode" href="$Link" title="Go to the $Title page">$MenuTitle</a></li>
<% end_loop %>
</div>


<div class="container">

<h1> $Title </h1>

<div class=”breadcrumb” />  $Breadcrumbs </div>

<div class="main col-sm-3" /> 

<% if $Menu(2) %>
  <h3>In this section</h3>
    <ul class="subnav">  
      <% loop $Menu(2) %>
        <li><a class="$LinkingMode" href="$Link">$MenuTitle</a></li>
      <% end_loop %>
    </ul>
<% end_if %>

  <!-- BEGIN ARCHIVES ACCORDION -->
    <h2 class="section-title">Archives</h2>
    <div id="accordion" class="panel-group blog-accordion">
        <div class="panel">
        <!--
            <div class="panel-heading">
                <div class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="">
                        <i class="fa fa-chevron-right"></i> 2014 (15)
                    </a>
                </div>
            </div>
        -->
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    <ul>
                    <% loop $ArchiveDates %>
                        <li><a href="$Link">$MonthName $Year ($ArticleCount)</a></li>
                    <% end_loop %>
                    </ul>
                </div>
            </div>
        </div>  
    </div>
    <!-- END  ARCHIVES ACCORDION -->



</div>



<div class="main col-sm-9" />  $Content  

<div id="blog-listing" class="list-style clearfix">
        <div class="row">
            <% if $SelectedRegion %>
                <h3>Region: $SelectedRegion.Title</h3>
            <% else_if $SelectedCategory %>
                <h3>Category: $SelectedCategory.Title</h3>
            <% else_if $StartDate %>
                <h3>Showing $StartDate.Full to $EndDate.Full</h3>
            <% end_if %>
</div></div>

<% include Children %>

<div class="forms"> $Form </div>
</div>
</div>
  </body>
