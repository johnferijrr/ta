@extends('auth.layouts')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Gallery</h4>
                <a href="{{ route('gallery.create') }}" class="btn btn-primary">Tambah Gallery</a>
            </div>
            <div class="card-body">
                <div id="gallery-container" class="row">
                    <!-- Render fallback data (dari server-side Laravel) -->
                    @foreach ($galleries as $gallery)
                        <div class="col-sm-2 mb-2 gallery-item" data-id="{{ $gallery->id }}">
                            <a class="example-image-link" href="{{ asset('storage/posts_image/' . $gallery->picture) }}" data-lightbox="roadtrip" data-title="{{ $gallery->description }}">
                                <img class="example-image img-fluid" src="{{ asset('storage/posts_image/' . $gallery->picture) }}" alt="Image-{{ $loop->index }}" />
                            </a>
                            <div class="mt-2 text-center">
                                <h6>{{ $gallery->title }}</h6>
                                <p>{{ $gallery->description }}</p>
                                <div>
                                    <!-- Edit button -->
                                    <a href="{{ route('gallery.edit', $gallery->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2L2.5 10.707V13.5h2.793L14 5.293 11.207 2zM15.854.854a.5.5 0 0 0-.708-.708L12.5 2.793 13.207 3.5 15.854.854z"/>
                                        </svg>
                                    </a>
                                    <!-- Delete button -->
                                    <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5V14a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1V5.5h-5zM1 2.5A.5.5 0 0 1 1.5 2h13a.5.5 0 0 1 0 1H1.5a.5.5 0 0 1-.5-.5zM1 4h14v1H1V4z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div id="pagination-container" class="d-flex justify-content-center">
                    {{ $galleries->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const galleryContainer = document.getElementById('gallery-container');
        const paginationContainer = document.getElementById('pagination-container');

        // Fetch gallery data from API
        fetch('/api/gallery')
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    const galleries = data.data;

                    if (galleries.length > 0) {
                        // Clear existing content
                        galleryContainer.innerHTML = '';
                        paginationContainer.innerHTML = ''; // Remove pagination for API-driven content

                        // Render new content dynamically
                        galleries.forEach(gallery => {
                            const galleryItem = `
                                <div class="col-sm-2 mb-2 gallery-item">
                                    <a class="example-image-link" href="/storage/posts_image/${gallery.picture}" data-lightbox="roadtrip" data-title="${gallery.description}">
                                        <img class="example-image img-fluid" src="/storage/posts_image/${gallery.picture}" alt="${gallery.title}" />
                                    </a>
                                    <div class="mt-2 text-center">
                                        <h6>${gallery.title}</h6>
                                        <p>${gallery.description}</p>
                                        <div>
                                            <!-- Edit button -->
                                            <a href="/gallery/${gallery.id}/edit" class="btn btn-warning btn-sm" title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2L2.5 10.707V13.5h2.793L14 5.293 11.207 2zM15.854.854a.5.5 0 0 0-.708-.708L12.5 2.793 13.207 3.5 15.854.854z"/>
                                                </svg>
                                            </a>
                                            <!-- Delete button -->
                                            <form action="/gallery/${gallery.id}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5V14a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1V5.5h-5zM1 2.5A.5.5 0 0 1 1.5 2h13a.5.5 0 0 1 0 1H1.5a.5.5 0 0 1-.5-.5zM1 4h14v1H1V4z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            `;
                            galleryContainer.innerHTML += galleryItem;
                        });
                    } else {
                        galleryContainer.innerHTML = '<h3 class="text-center">Tidak ada data.</h3>';
                    }
                } else {
                    console.error('Failed to load data from API.');
                    // Do not clear existing content
                }
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                // Do not clear existing content
            });
    });
</script>
@endpush
