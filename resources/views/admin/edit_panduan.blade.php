<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PKM-K</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="wrapper">
        @include('admin.sidebar')
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        {{-- <li class="nav-item">
                            <a href="/Login/index"><i class="bi bi-box-arrow-in-right"></i>
                              Login</a>
                        </li> --}}
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h4>Edit Buku Panduan PKM-K</h4>
                    </div>
                    {{-- <form action="{{ route('upload.panduan') }}" method="POST" enctype="multipart/form-data" id="upload-form">
                        @csrf
                
                        <!-- Area drag and drop -->
                        <div id="drop-area" onclick="document.getElementById('fileInput').click()" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)" ondrop="handleDrop(event)">
                            <b>File Buku Panduan</b><br/>
                            <input type="file" name="file" id="fileInput" onchange="handleFileChange(this.files)">
                            <p>Drag and drop file di sini atau klik untuk memilih file</p>
                            <button type="submit" id="upload-btn">Upload</button>
                        </div>
                
                    </form> --}}
                    {{-- <form action="/upload/proses" method="POST" enctype="multipart/form-data" ondrop="upload_file(event)" ondragover="return false">
                        @csrf
                        <div class="drag-area">
                            <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                            <header>Drag & Drop to Upload File</header>
                            <span>OR</span>
                            <button>Browse File</button>
                            <input type="file" name="file" id="file" hidden>
                        </div>
                    </form> --}}
                    {{-- <form action="{{ route('upload.panduan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                        <b>File Buku Panduan</b><br/>
                        <input type="file" name="file">
                        </div>
                        
                        <input type="submit" value="Upload" class="btn btn-primary">
                    </form> --}}
                    <form action="{{ route('upload.panduan') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="file" class="form-label">Upload File Panduan</label>
                        <input class="form-control" type="file" id="file" name="file">
                    </div>
                    <input type="submit" value="Upload" class="btn btn-primary">
                    </form>
                </div>
            </main>
            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="#" class="text-muted">
                                    <strong>SFK</strong>
                                </a>
                            </p>
                        </div>
                        <div class="col-6 text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Contact</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">About Us</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Terms</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Booking</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/script.js"></script>
    <script src="/js/app.js"></script>
</body>

</html>