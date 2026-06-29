<x-app-layout title="ImageGallery List">
    <div class="content-area">
        <x-list-header title="ImageGallery List" />

        <!-- Folder List -->
        <div class="mb-5 container pt-5">
            <h2 class="h5 fw-bold mb-3">📁 Select a Folder</h2>
            <div class="d-flex flex-wrap gap-2">
                @foreach ($directories as $folder)
                    <a href="{{ route('gallery.all', ['folder' => $folder]) }}"
                        class="btn {{ $folder == $selectedFolder ? 'btn-primary text-white' : 'btn-outline-primary' }}">
                        {{ ucfirst($folder) }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Images from selected folder -->
        <div class="container">
            <h2 class="h5 fw-bold mb-4">
                🖼️ Images in: <span class="text-primary">{{ $selectedFolder }}</span>
            </h2>
         
            <div class="row g-3">
                @forelse ($images as $image)
                    <div class="col-6 col-md-4 col-lg-3 mb-4">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                            <div class="ratio ratio-4x3">
                                <img src="{{ $image['url'] }}" alt="Image" class="img-fluid object-fit-cover w-100 h-100"
                                    style="object-fit: cover;">
                            </div>

                            <div class="card-body text-center p-2">
                                <small class="text-muted d-block mb-1">
                                    <strong>Size:</strong> {{ number_format($image['size'] / 1024, 1) }} KB
                                </small>
                                <small class="text-muted d-block">
                                    <strong>Dimensions:</strong> {{ $image['width'] }}×{{ $image['height'] }}
                                </small>
                            </div>
                        </div>
                    </div>

                @empty
                    <div class="col-12">
                        <p class="text-danger">No images found in this folder.</p>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
