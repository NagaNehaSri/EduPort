</div> <!-- end container-fluid -->

</div> <!-- end content -->

<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                2025 © Developed by <a href="" target="_blank">WebBrilliance</a>
            </div>
        </div>
    </div>
</footer>
<!-- end Footer -->


</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->

</div>
<!-- END wrapper -->


<!-- Vendor js -->
<script src="{{ asset('admin_assets') . '/js/vendor.min.js' }}"></script>


<!-- Bootstrap select plugin -->
<script src="{{ asset('admin_assets') . '/libs/bootstrap-select/bootstrap-select.min.js' }}"></script>

<script src="{{ asset('admin_assets') . '/summernote/summernote-bs4.min.js' }}"></script>

<!-- Init js -->
<script src="{{ asset('admin_assets') . '/js/pages/form-summernote.init.js' }}"></script>
<!-- dashboard init -->
<script src="{{ asset('admin_assets') . '/js/pages/dashboard.init.js' }}"></script>
<!-- App js -->
<script src="{{ asset('admin_assets') . '/js/app.min.js' }}"></script>
 <script>
        $(document).ready(function () {
  
            /*------------------------------------------
            --------------------------------------------
            Country Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#country_id').on('change', function () {
                var idCountry = this.value;
                //alert(idCountry);
               // $("#state_id").html('');
                $.ajax({
                    url: "{{url('fetchstate')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state_id').html('<option value="">-- Select State --</option>');
                        $.each(result.states, function (key, value) {
                            $("#state_id").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        //$('#city_id').html('<option value="">-- Select City --</option>');
                    }
                });
            });




  
            /*------------------------------------------
            --------------------------------------------
            State Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            // $('#state-dropdown').on('change', function () {
            //     var idState = this.value;
            //     $("#city-dropdown").html('');
            //     $.ajax({
            //         url: "{{url('api/fetch-cities')}}",
            //         type: "POST",
            //         data: {
            //             state_id: idState,
            //             _token: '{{csrf_token()}}'
            //         },
            //         dataType: 'json',
            //         success: function (res) {
            //             $('#city-dropdown').html('<option value="">-- Select City --</option>');
            //             $.each(res.cities, function (key, value) {
            //                 $("#city-dropdown").append('<option value="' + value
            //                     .id + '">' + value.name + '</option>');
            //             });
            //         }
            //     });
            // });
  
        });
    </script>
    <script>
        
$(document).ready(function () {
  
            /*------------------------------------------
            --------------------------------------------
            Country Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#course_id').on('change', function () {
                var course = this.value;
                //alert(idCountry);
               // $("#state_id").html('');
                $.ajax({
                    url: "{{url('fetchbatch')}}",
                    type: "POST",
                    data: {
                        course_id: course,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#batch_id').html('<option value="">-- Select Batch --</option>');
                        $.each(result.batches, function (key, value) {
                            $("#batch_id").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        //$('#city_id').html('<option value="">-- Select City --</option>');
                    }
                });
            });

         });
    </script>
@yield('jscodes')
<style>
    .dropify-wrapper .dropify-preview .dropify-render img {
        border-radius: 6px;
    }

    .avatar-lg {
        height: 5.5rem;
        width: 5.5rem;
        border-radius: 3px;
        object-fit: cover;
    }

    .cke_chrome {
        border: 3px solid #d1d1d1;
        border-radius: 3px;
    }
</style>
<style>
    .invalid-feedback{
        display: block;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/css/suneditor.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/suneditor.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/suneditor@latest/src/lang/en.js"></script>

<script>
    // Select all <textarea> elements with the class name 'sun-editor'
    const sunEditorElements = document.querySelectorAll('textarea.sun-editor');
    // Create Suneditor instances
    const editors = [];
    sunEditorElements.forEach((element) => {
        const editor = SUNEDITOR.create(element, {
            width: '100%',
            height: '300',
            charCounter: true,
            lang: SUNEDITOR_LANG['en'],
            charCounterLabel: 'Characters :',
            buttonList: [
                ['undo', 'redo', 'font', 'fontSize', 'formatBlock'],
                ['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript'],
                ['fontColor', 'hiliteColor', 'textStyle'],
                ['removeFormat'],
                ['outdent', 'indent'],
                ['align', 'horizontalRule', 'list', 'lineHeight'],
                ['table'],
                ['link', 'image', 'video'],
                ['showBlocks', 'fullScreen', 'codeView', 'preview', 'print']
            ]
        });
        editors.push(editor);
    });

    // Select all <textarea> elements with the class name 'mini-suneditor'
    const miniSunEditorElements = document.querySelectorAll('textarea.mini-suneditor');
    miniSunEditorElements.forEach((element) => {
        const editor = SUNEDITOR.create(element, {
            width: '100%',
            height: '50', // Smaller height
            charCounter: true,
            lang: SUNEDITOR_LANG['en'],
            charCounterLabel: 'Characters :',
            buttonList: [
                ['fontSize', 'bold', 'fontColor', 'formatBlock'] // Added text formatting options
            ]
        });
        editors.push(editor);
    });

    // Handle form submission
    const form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        editors.forEach((editor, index) => {
            const content = editor.getContents();
            if (index < sunEditorElements.length) {
                sunEditorElements[index].value = content;
            } else {
                miniSunEditorElements[index - sunEditorElements.length].value = content;
            }
        });
    });
</script>

<style>
    .sun-editor .se-btn {
        width: 30px;
        height: 30px;
    }

    .sun-editor .se-btn-select {
        padding: 0px 6px;
    }

    .sun-editor {
        font-family: inherit;
    }

    .sun-editor-editable {
        font-family: inherit;
    }

    .sun-editor .se-toolbar {
        font-family: inherit;
    }

    .mini-suneditor .se-btn {
        width: 20px;
        height: 20px;
    }

    .mini-suneditor .se-btn-select {
        padding: 0px 4px;
    }

    .mini-suneditor .se-toolbar .se-btn-group {
        display: flex;
        flex-wrap: nowrap;
    }

    .mini-suneditor .se-toolbar .se-btn-group .se-btn {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .mini-suneditor .se-toolbar .se-btn-group .se-btn:hover .se-dropdown-content {
        display: none !important;
        /* Prevent dropdown on hover */
    }

    .sun-editor .se-toolbar {
        z-index: unset;
    }
</style>
<script>
    $(document).on('click', '.cdelete', function() {

        var id = $(this).data('value');
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#F7531F",
            cancelButtonColor: "#6c757d",
            confirmButtonText: "Yes, delete it!"
        }).then(function(t) {
            if (t.value == true) {
                $("#deleteform" + id).submit();
            }
        })
    });
</script>
<style>
    .swal2-popup{
        font-size: .79rem;
    }
</style>
</body>
</html>
