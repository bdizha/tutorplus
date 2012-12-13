<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <title>jQuery File Upload Example</title>
        <link rel="stylesheet" href="/css/jquery-ui2.css" id="theme"/>
        <link rel="stylesheet" href="/css/jquery.fileupload-ui.css"/>
        <link rel="stylesheet" href="/css/form.css"/>
        <link rel="stylesheet" href="/css/style.css"/>
        <link rel="stylesheet" href="/css/jquery.simple-modal-iframe.css"/>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
        <script src="//ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script>
        <script src="/js/jquery.iframe-transport.js"></script>
        <script src="/js/jquery.fileupload.js"></script>
        <script src="/js/jquery.fileupload-ui.js"></script>
        <script src="/js/application.js"></script>
    </head>
    <body>
        <div id="simple-modal" class="hide">
            <div id="modal-title" class="modal-title">
                Add Files
            </div>
            <div id="modal-body" class="modal-body">
                <div id="fileupload">
                    <form action="/upload_file" id="upload_form" method="POST" enctype="multipart/form-data">
                        <div class="fileupload-buttonbar">    
                            <label for="file_folder_id">Choose folder to upload files into:</label>
                            <select id="file_folder_id" name="file[folder_id]">
                                <option value="13">File System</option>
                                <option value="14">- Users</option>
                                <option value="15">- - Batanayi Matuku</option>
                                <option value="16">- - - My Documents</option>
                                <option value="21">- - - Batanayi</option>
                                <option value="22">- - - - Notes</option>
                                <option value="23">- - - - - Artificial Intelligence</option>
                                <option value="17">- Courses</option>
                                <option value="24">- - HCI</option>
                                <option value="25">- - PHE</option>
                                <option value="18">- Assignments</option>
                            </select>
                        </div>
                        <div class="fileupload-buttonbar">
                            <label class="fileinput-button" id="add_files">
                                <span>+ Add files...</span>
                                <input type="file" name="file[]">
                            </label>
                        </div>
                    </form>
                    <div class="fileupload-content">
                        <table class="files"></table>
                        <div class="fileupload-progressbar"></div>
                    </div>
                    <div class="fileupload-buttonbar">
                        <button type="submit" id="start_upload" class="start">Upload all</button>
                        <button type="reset" class="cancel">Cancel all</button>
                        <button type="button" class="delete">Delete all</button>
                    </div>
                </div>
                <script id="template-upload" type="text/x-jquery-tmpl">
                    <tr class="template-upload{{if error}} ui-state-error{{/if}}">
                        <td class="name">${name}</td>
                        <td class="size">${sizef}</td>
                        {{if error}}
                        <td class="error" colspan="2">Error:
                            {{if error === 'maxFileSize'}}File is too big
                            {{else error === 'minFileSize'}}File is too small
                            {{else error === 'acceptFileTypes'}}Filetype not allowed
                            {{else error === 'maxNumberOfFiles'}}Max number of files exceeded
                            {{else}}${error}
                            {{/if}}
                        </td>
                        {{else}}
                        <td class="progress"><div></div></td>
                        <td class="start"><button>Upload</button></td>
                        {{/if}}
                        <td class="cancel"><button>Cancel</button></td>
                    </tr>
                    </script>
                    <script id="template-download" type="text/x-jquery-tmpl">
                        <tr class="template-download{{if error}} ui-state-error{{/if}}">
                            {{if error}}
                            <td class="name">${name}</td>
                            <td class="size">${sizef}</td>
                            <td class="error" colspan="2">Error:
                                {{if error === 1}}File exceeds upload_max_filesize (php.ini directive)
                                {{else error === 2}}File exceeds MAX_FILE_SIZE (HTML form directive)
                                {{else error === 3}}File was only partially uploaded
                                {{else error === 4}}No File was uploaded
                                {{else error === 5}}Missing a temporary folder
                                {{else error === 6}}Failed to write file to disk
                                {{else error === 7}}File upload stopped by extension
                                {{else error === 'maxFileSize'}}File is too big
                                {{else error === 'minFileSize'}}File is too small
                                {{else error === 'acceptFileTypes'}}Filetype not allowed
                                {{else error === 'maxNumberOfFiles'}}Max number of files exceeded
                                {{else error === 'uploadedBytes'}}Uploaded bytes exceed file size
                                {{else error === 'emptyResult'}}Empty file upload result
                                {{else}}${error}
                                {{/if}}
                            </td>
                            {{else}}
                            <td class="name">
                                <a href="${url}"{{if thumbnail_url}} target="_blank"{{/if}}>${name}</a>
                            </td>
                            <td class="size">${sizef}</td>
                            <td class="progress" colspan="2"></td>
                            {{/if}}
                            <td class="delete">
                                <button data-type="${delete_type}" data-url="${delete_url}">Delete</button>
                            </td>
                        </tr>
                        </script>
                    </div>
                </div>
            </body> 
        </html>