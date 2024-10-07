<style>
    .accordion {
        width: 100%;
    }
</style>


<div class="container d-flex justify-content-center gap-2">
    
    <div class="card col-12 col-sm-12 col-md-4 px-3">

        <img src="{{ $user->profile_photo_url }}" alt="Foto de Perfil" class="card-img-top">

        <hr class="p-0 mb-0 mt-2">

        <h4 class="card-header">
            {{ $user->name }}
            | ID: {{ $user->id }}
        </h4>
        <div class="card-body">

            <p class="card-text mb-1">
                <ul>
                    <li>{{ $user->email }}</li>
                    <li>{{ $user->created_at }}</li>
                    <li>{{ $user->updated_at }}</li>
                </ul>
            </p>

            <div class="card-links d-flex justify-content-center align-items-center">
                <button type="button" class="btn btn-primary p-1 mx-1" data-toggle="modal" data-target="#profilePhotoModal">
                    Update Profile Photo
                </button>
                <button type="button" class="btn btn-secondary p-1 mx-1" data-toggle="modal" data-target="#updateProfileModal">
                    Update Name and email
                </button>
            </div>
        </div>
    </div>

    <div class="accordion">

        @foreach($user->supports as $support)

        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button w-100" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $support->id }}" aria-expanded="true" aria-controls="collapse{{ $support->id }}">
                    {{ $support->subject }}
                </button>

            </h2>

            <div id="collapse{{ $support->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">

                <div class="accordion-body">
                    <strong>{{ $support->body }}</strong>
                    <p>Status: {{ $support->status }}</p>
                    <p>Data Criada: {{ $support->created_at }}</p>
                </div>

            </div>

        </div>
    
    @endforeach
    

    </div>

</div>


<!-- Modal para atualizar foto de perfil -->
<div class="modal fade" id="profilePhotoModal" tabindex="-1" role="dialog" aria-labelledby="profilePhotoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profilePhotoModalLabel">Update Profile Photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('profile.update.photo') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="profile_photo">Profile Photo</label>
                        <input type="file" id="profile_photo" name="profile_photo" class="form-control" required onchange="previewImage(event)">
                    </div>
                    <div class="form-group">
                        <img id="photoPreview" src="{{ $user->profile_photo_url }}" alt="Prévia da Nova Foto" class="img-fluid mb-3" style="display: none;">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Photo</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal para atualizar nome e e-mail -->
<div class="modal fade" id="updateProfileModal" tabindex="-1" role="dialog" aria-labelledby="updateProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateProfileModalLabel">Atualizar Nome e E-mail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        const photoPreview = document.getElementById('photoPreview');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                photoPreview.src = e.target.result;
                photoPreview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    }
</script>