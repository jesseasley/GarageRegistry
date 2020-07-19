<div class="UpdateCoverPhoto hidden-sm hidden-xs" id="divUpdateCoverPhoto">
    <a href="javascript:void(0);" onclick="openUpdateCoverPhotoModal();">+ Update Cover Photo</a>
</div>
<div class="EditGaragePersonalPhoto hidden-sm hidden-xs" id="divEditGaragePersonalPhoto">
    <a href="javascript:void(0);" onclick="openEditProfilePictureModal();">Edit Profile Photo</a>
</div>
<div class="MyGaragePersonalPhoto">
<img id="imgMyGaragePersonalPhoto" class="hidden-xs img-circle" style="border: solid black 1px;" />
</div>
<div id="myGarage" class="panel panel-default">
	<div class="panel-heading">
        <h3>My Garage</h3>
    </div>
    <div class="panel-body">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 hidden-xs">
			    <h3><div id="username">place holder</div></h3>
                <div>
                    <!--<button id="uploadPhotoButtn" class="btn greenButton">Upload Photo</button>-->
                    <a href="#NewsManagement" onclick="showPage('newsManagement.php', 'myGarageMenu');" id="manageNewsButton" class="btn blueButton btn-primary">Manage News</a>
                    <a href="#UsersManagement" onclick="showPage('usersManagement.php', 'myGarageMenu');" id="manageUsersButton" class="btn blueButton btn-primary">Manage Users</a>
                    <a href="#StockPhotosManagement" onclick="showPage('stockPhotosManagement.php', 'myGarageMenu');" id="manageStockPhotosButton" class="btn blueButton btn-primary">Manage Stock Photos</a>
                    <a href="#TitlePictureManagement" onclick="showPage('titlePictureManagement.php', 'myGarageMenu');" id="manageTitlePicturesButton" class="btn blueButton btn-primary">Manage Title Pictures</a>
                </div>
	        </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="background-image:url('images/myGaragePageBackground.jpg');background-repeat:no-repeat;background-size:cover">
                <div id="projectBoxes"></div>
                <!--<form id="frmUpload" enctype="multipart/form-data">
			        <div class="row">
				        <div class="col-lg-6 col-md-6 sol-sm-12">
					        <h3>Upload Photo</h3>
					        <div class="panel" style="border 2px white">
						        <input class="hidden" onchange="cleanFilename($(this).val(), 'fileTrimHidden', 'fileLabel');" 
                                       type="file" id="fileMyGarageCar" name="fileMyGarageCar" 
                                       accept=".jpg,.gif,.png,.jpeg" />
						        <label class="btn btn-primary" for="fileMyGarageCar">Select file</label>
						        <label id="fileLabel">No file chosen yet</label>
                                <input type="hidden" id="fileTrimHidden" name="fileTrimHidden" />
					        </div>
					        <div id="uploadStatus"></div>
					        <div id="myGarageCars"></div>
				        </div>
				        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					        <div class="well">
						        <label>Create project name or add to existing project</label>
						        <input type="text" class="form-control" id="project" />
						        <label>Year</label>
						        <input type="number" class="form-control" id="year" />
						        <label>Make</label>
						        <input type="text" class="form-control" id="make" />
						        <label>Model</label>
						        <input type="text" class="form-control" id="model" />
						        <label>Trim</label>
						        <input type="text" class="form-control" id="trim" /> 
						        <input type="hidden" id="trimFile" name="trimFile" />
						        <br />
						        <center><button class="btn btn-primary" onclick="uploadMyGarageCar();">Save</button></center>
					        </div>
				        </div>
			        </div>
		        </form>-->
	        </div>
        </div>
	</div>
</div>
