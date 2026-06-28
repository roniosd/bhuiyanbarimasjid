@props(['name' => '', 'title' => '', 'size' => '', 'img' => null])

<div class="rounded p-1">
    <label for="" class="fw-bold">{{$title}}
        <p style="font-size: 10px;">Size should be <span>{{$size}}</span></p>
    </label>

    <div class="d-flex justify-content-center">
        <div class="w-100" style="max-width: 500px;">
            <!-- Drop zone -->
            <div id="dropzone-{{ $name }}" class="rounded text-center p-4 cursor-pointer"
                style="cursor: pointer; border: 2px dashed gray;">
                <p class="text-muted small mb-2">Drag & drop an image here or click to upload</p>
                <img id="{{ $name }}-preview" src="{{ $img ?? asset('/public/storage/default/category.png') }}"
                    alt="Image Preview" class="img-fluid rounded shadow-sm border mt-3"
                    style="max-height: 160px; object-fit: cover;" />
            </div>

            <!-- Hidden file input -->
            <input type="file" name="{{ $name }}" id="{{ $name }}" accept="image/*" class="d-none" />
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const dropzone = document.getElementById('dropzone-{{ $name }}');
        const fileInput = document.getElementById('{{ $name }}');
        const preview = document.getElementById('{{ $name }}-preview');

        dropzone.addEventListener('click', () => fileInput.click());

        dropzone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropzone.style.backgroundColor = '#eef2ff'; // soft blue
        });

        dropzone.addEventListener('dragleave', () => {
            dropzone.style.backgroundColor = 'white';
        });

        dropzone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropzone.style.backgroundColor = 'white';

            const files = e.dataTransfer.files;
            if (files.length > 0) {
                fileInput.files = files;
                previewFile(files[0]);
            }
        });

        fileInput.addEventListener('change', () => {
            if (fileInput.files.length > 0) {
                previewFile(fileInput.files[0]);
            }
        });

        function previewFile(file) {
            if (!file.type.startsWith('image/')) {
                alert('Please upload a valid image file.');
                return;
            }

            const reader = new FileReader();
            reader.onload = (e) => {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
