@extends('admin.layouts.main')

@section('content')

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('portfolio.index') }}">Portfolio</a></li>
                                <li class="breadcrumb-item active">Edit Portfolio Image</li>
                            </ol>
                        </div>
                    @section('page_title')
                        Portfolio Image
                    @endsection
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        @include('flash_msg')
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="page-title">Portfolio Images</h4>
                            </div>
                        </div>
                        <hr>

                        {{-- @method('PUT') --}}

                        
                        <form id="form" method="post" action="{{ route('portfolio_image.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-1">
                                <input type="hidden" name="portfolio_id" value="{{ $data->id }}">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="image">Image :</label>
                                        <input type="file" class="dropify @error('image') is-invalid @enderror"
                                            name="image" id="image"
                                            accept="image/jpg, image/jpeg, image/png,image/webp"
                                            data-default-file="{{ asset('uploads/') }}portfolio/{{ $data->image }}">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            {{-- </div> --}}

                            <div class="form-group mb-0">
                                <input type="submit" name="submit" id="save" class="btn btn-success"
                                    value="Add">
                            </div>
                        </form>
                        <div class="row mt-1">

                            <div class="col-md-12">
                                <div class="form-group">
                                    {{-- <label for="image">Uploaded Images :</label> --}}
                                    @foreach ($portfolio_images as $image)
                                        <div style="position: relative; display:inline-block;">
                                            <img data-src="{{ asset('uploads/portfolio/' . $image->image) }}"
                                                style="width: 100px; height: 100px; object-fit: cover; margin-bottom:3px;" class="lozad">
                                            {{-- <form method="post"
                                                action="{{ route('portfolio_image.destroy', $image->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this image?')"
                                                    class="btn btn-danger waves-effect waves-light btn-xs"
                                                    style="position: absolute; top:0;right:0;">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form> --}}
                                            <form id="deleteForm_{{ $image->id }}" method="post" action="{{ route('portfolio_image.destroy', $image->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="openConfirmationDialog({{ $image->id }})" class="btn btn-danger waves-effect waves-light btn-xs" style="position: absolute; top:0;right:0;">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            
                                            
                                            
                                        </div>
                                    @endforeach
                                    <!-- Confirmation Dialog -->
                                    <div id="confirmationDialog" class="confirmation-dialog">
                                        <div class="confirmation-content">
                                            <p>Are you sure you want to delete this image?</p>
                                            <button onclick="confirmDelete()" class="btn btn-danger">Delete</button>
                                            <button onclick="closeConfirmationDialog()" class="btn btn-secondary">Cancel</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div> <!-- end container-fluid -->
</div> <!-- end content -->
@endsection
@section('csscodes')
<link rel="stylesheet" href="{{ asset('admin_assets') . '/libs/dropify/dropify.min.css' }}">
@endsection
@section('jscodes')
<!-- Plugins js -->
<script src="{{ asset('admin_assets') . '/libs/dropify/dropify.min.js' }}"></script>

<!-- Init js-->
<script src="{{ asset('admin_assets') . '/js/pages/form-fileuploads.init.js' }}"></script>
<script src="https://cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
<link href="{{ asset('admin_assets') . '/libs/datatables/dataTables.bootstrap4.min.css' }}" rel="stylesheet">
<link href="{{ asset('admin_assets') . '/libs/datatables/responsive.bootstrap4.min.css' }}" rel="stylesheet">

<!-- Sweet Alert-->
<link href="{{ asset('admin_assets') . '/libs/sweetalert2/sweetalert2.min.css' }}" rel="stylesheet" type="text/css" />

<!-- Tables -->
<script src="{{ asset('admin_assets') . '/libs/datatables/jquery.dataTables.min.js' }}"></script>
<script src="{{ asset('admin_assets') . '/libs/datatables/dataTables.bootstrap4.min.js' }}"></script>

<script src="{{ asset('admin_assets') . '/libs/datatables/dataTables.responsive.min.js' }}"></script>
<script src="{{ asset('admin_assets') . '/libs/datatables/responsive.bootstrap4.min.js' }}"></script>

<!-- Sweet Alerts js -->
<script src="{{ asset('admin_assets') . '/libs/sweetalert2/sweetalert2.min.js' }}"></script>

<script src="https://cdn.jsdelivr.net/npm/lozad"></script>

<script type="text/javascript">
// initialize library
lozad('.lozad',{
    load:function(e1){
        e1.src = e1.dataset.src;
        e1.onload=function(){
            // e1.classList.add('fade')
        }
    }
}).observe()
</script>

<!-- Init js-->
<script src="{{ asset('admin_assets') . '/js/pages/datatables.init.js' }}"></script>
<script src="{{ asset('admin_assets') . '/js/pages/sweet-alerts.init.js' }}"></script>
<style>
    .confirmation-dialog {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1;
}

.confirmation-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    text-align: center;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

.confirmation-content p {
    margin-bottom: 20px;
}

</style>
<script>
    var currentImageId;

function openConfirmationDialog(imageId) {
    currentImageId = imageId;
    document.getElementById("confirmationDialog").style.display = "block";
}

function closeConfirmationDialog() {
    document.getElementById("confirmationDialog").style.display = "none";
}

function confirmDelete() {
    document.getElementById("confirmationDialog").style.display = "none";
    document.getElementById('deleteForm_' + currentImageId).submit();
}

</script>
<script>
    // Function to generate a thumbnail image URL
    function generateThumbnailUrl(originalUrl, width, height) {
        // Replace 'cloud_image_url' with the URL of your image in the cloud
        return originalUrl + '?w=' + width + '&h=' + height; // Adjust as needed
    }

    // Function to load thumbnail images
    function loadThumbnailImages() {
        var thumbnails = document.querySelectorAll('.thumbnail');

        thumbnails.forEach(function(thumbnail) {
            var originalSrc = thumbnail.getAttribute('data-original-src');
            var width = thumbnail.offsetWidth; // Use the current width of the element
            var height = thumbnail.offsetHeight; // Use the current height of the element
            var thumbnailUrl = generateThumbnailUrl(originalSrc, width, height);
            
            // Set the thumbnail image source
            thumbnail.src = thumbnailUrl;
        });
    }

    // Call the function when the page loads
    window.addEventListener('load', loadThumbnailImages);
</script>
@endsection
