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
        <div class="row">
            <span id="pageTitle" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3>My Project</h3>
            </span>
            <span id="projectName" class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></span>
        </div>
    </div>
    <div class="panel-body">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="well">
                    <input type="hidden" id="myProjectID" />
                    <input type="hidden" id="myProjectTMUserID" />
                    <div id="myProjectNameGroup" class="form-group has-error has-feedback">
                        <label>Project Name</label>
                        <input type="text" class="form-control" id="myProjectName" onkeyup="validateProjectForm();" />
                        <span id="myProjectNameGroupSpan" class="glyphicon glyphicon-remove form-control-feedback"></span>
                    </div>
                    <div id="myProjectDescriptionGroup" class="form-group has-error has-feedback">
                        <label>Description</label>
                        <textarea class="form-control" id="myProjectDescription" rows="6" onkeyup="validateProjectForm();"></textarea>
                        <span id="myProjectDescriptionGroupSpan" class="glyphicon glyphicon-remove form-control-feedback"></span>
                    </div>
                    <div id="myProjectMakeGroup" class="form-group has-error has-feedback">
                        <label>Make</label>
                        <input type="text" class="form-control" id="myProjectMake" onkeyup="validateProjectForm();" />
                        <span id="myProjectMakeGroupSpan" class="glyphicon glyphicon-remove form-control-feedback"></span>
                    </div>
                    <div id="myProjectModelGroup" class="form-group has-error has-feedback">
                        <label>Model</label>
                        <input type="text" class="form-control" id="myProjectModel" onkeyup="validateProjectForm();" />
                        <span id="myProjectModelGroupSpan" class="glyphicon glyphicon-remove form-control-feedback"></span>
                    </div>
                    <div id="myProjectYearGroup" class="form-group">
                        <label>Year</label>
                        <input type="number" class="form-control" id="myProjectYear"  />
                        <span id="myProjectYearGroupSpan" class="glyphicon glyphicon-remove form-control-feedback"></span>
                    </div>
                    <div id="myProjectTrimGroup" class="form-group">
                        <label>Trim</label>
                        <input type="text" class="form-control" id="myProjectTrim" />
                        <span id="myProjectTrimGroupSpan" class="glyphicon glyphicon-remove form-control-feedback"></span>
                    </div>
                    <label>Built By</label>
                    <input type="text" class="form-control" id="myProjectBuiltBy" />
                    <input type="hidden" id="trimFile" name="trimFile" />
                    <br />
                    <center>
                        <a id="btnMyProjectSave" href="javascript:void(0);" class="btn btn-primary" onclick="saveMyProject(
                           $('#myProjectID').val(),
                           $('#myProjectTMUserID').val(),
                           encode($('#myProjectName').val()),
                           encode($('#myProjectDescription').val()),
                           encode($('#myProjectYear').val()),
                           encode($('#myProjectMake').val()),
                           encode($('#myProjectModel').val()),
                           encode($('#myProjectTrim').val()),
                           encode($('#myProjectBuiltBy').val()),
                           '1');">Save</a>
                        &nbsp;
                        <a id="btnMyProjectDelete" href="#MyGarage" class="btn btn-danger" onclick="saveMyProject(
                           $('#myProjectID').val(),
                           $('#myProjectTMUserID').val(),
                           encode($('#myProjectName').val()),
                           encode($('#myProjectDescription').val()),
                           encode($('#myProjectYear').val()),
                           encode($('#myProjectMake').val()),
                           encode($('#myProjectModel').val()),
                           encode($('#myProjectTrim').val()),
                           encode($('#myProjectBuiltBy').val()),
                           '0');">Delete Project</a>
                    </center>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="well">
                    <table>
                        <tr>
                            <td>
                                <h4>Photos in This Project</h4>
                            </td>
                            <td style="width:10px;"></td>
                            <td>
                                <a id="btnAddProjectPhoto" class="btn btn-primary" href="javascript:void(0);"
                                   onclick="openProjectImageModal('-1');">Add Photo</a>
                            </td>
                        </tr>
                    </table>
                    <div id="projectPhotos" class="projectPhotos"></div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="well">
                    <table>
                        <tr>
                            <td>
                                <h4>Parts in This Project</h4>
                            </td>
                            <td style="width:10px;"></td>
                            <td>
                                <a id="btnAddProjectPart" class="btn btn-primary" href="javascript:void(0);" 
                                   onclick="openProjectPartModal('-1');">Add Part</a>
                            </td>
                        </tr>
                    </table>
                    <div id="projectParts" class="projectParts"></div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="well">
                    <h4>Comments&nbsp;&nbsp;<span id="projectFormAddPost"></span>
                    </h4>
                    <div id="projectForum" class="projectForum"></div>
                    <div id="addNewProjectThread"></div>
                </div>
            </div>
        </div>
	</div>
</div>
