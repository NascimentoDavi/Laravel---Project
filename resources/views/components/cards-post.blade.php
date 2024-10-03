<div class="container my-3">

    {{-- <div class="col-8">

        <div class="row g-0">

            <div class="col-4">
                <img src="https://picsum.photos/400/400" alt="" class="card-img-fluid rounded-start w-100">
            </div>

            <div class="col-8">
                <div class="card-body">

                    <h5 class="card-title">Card Title</h5>
                    <h6 class="card-subtitle">Card Subtitle</h6>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos quis expedita vero ducimus nostrum obcaecati iure voluptatum qui fuga possimus quisquam esse quas hic sequi et aut tempora, magnam neque.
                    </p>
                    <div class="card-links">
                        <a href="3" class="card-link">Link 1</a>
                        <a href="3" class="card-link">Link 2</a>
                        <a href="3" class="card-link">Link 3</a>
                    </div>
        
                </div>

            </div>

        </div>

    </div> --}}
    
    {{-- <hr> --}}



    <style>
        .card-text {
            display: -webkit-box;
            overflow: hidden;
            -webkit-line-clamp: 3; /* Limite de 3 linhas */
            -webkit-box-orient: vertical;
        }

        /* Para telas pequenas, aumenta o limite de palavras */
        @media (max-width: 575.98px) {
            .card-text {
                -webkit-line-clamp: 1; /* Limite de 1 linha para telas pequenas */
            }
        }

        /* Para telas médias, mantém o limite de 2 linhas */
        @media (min-width: 576px) and (max-width: 767.98px) {
            .card-text {
                -webkit-line-clamp: 2; /* Limite de 2 linhas para telas médias */
            }
        }

        .card-link-view {
            color: #fad9a6;
            padding: 7px
        }
        .card-link-view:hover {
            padding: 9px;
        }
        .card-link-help,
        .card-link-share {
            color: #142433;
            text-decoration: none;
            border-bottom: 3px solid #fff3;
        }
        .card-link-share {
            color: #142433;
        }
        .card-link-help::after {
            content: ' → ';
        }
        .card-link-help:hover, 
        .card-link-share:hover {
            border-bottom-color: #142433; /* Aplica a cor de borda inferior em ambas as classes */
        }
    </style>



    <div class="card-group gap-3">

        @foreach ($supports as $item)

            <div class="card col-sm-12 col-md-6 col-lg-4 my-3 border border-5">
                <h4 class="card-header bg-secondary">
                    {{ $item->status }}
                </h4>
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $item->subject }}
                    </h5>
                    <h6 class="card-subtitle">
                        {{ $item->createdAt }}
                    </h6>
                    <p class="card-text">
                        {{ $item->body }}
                    </p>
                    <div class="card-links">
                        <a href="3" class="bg-dark rounded-3 card-link-view card-link text-decoration-none">Ver</a>
                        <a href="3" class="card-link-help card-link text-decoration-none">Help</a>
                        <a href="3" class="card-link-share card-link text-decoration-none">
                            Share
                            <i class="bi bi-share"></i>
                        </a>
                    </div>
                </div>
            </div>

        @endforeach

        <!--
        <div class="card col-sm-12 col-md-6 col-lg-4 my-3 border border-5">

            {{-- <img src="https://picsum.photos/50/50" alt="" class="card-img-top"> --}}
            <h4 class="card-header bg-secondary">Status</h4>

            <div class="card-body">

                <h5 class="card-title">Card Title</h5>
                <h6 class="card-subtitle">Card Subtitle</h6>
                <p class="card-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos quis expedita vero ducimus nostrum obcaecati iure voluptatum qui fuga possimus quisquam esse quas hic sequi et aut tempora, magnam neque.
                </p>
                <div class="card-links">
                    <a href="3" class="bg-dark rounded-3 card-link-view card-link text-decoration-none">View</a>
                    <a href="3" class="card-link-help card-link text-decoration-none">Help</a>
                    <a href="3" class="card-link-share card-link text-decoration-none">
                        Share
                        <i class="bi bi-share"></i>
                    </a>
                </div>

            </div>

        </div>

        <div class="card col-sm-12 col-md-6 col-lg-4 my-3 border border-5">

            {{-- <img src="https://picsum.photos/50/50" alt="" class="card-img-top"> --}}
            <h4 class="card-header bg-secondary">Status</h4>

            <div class="card-body">

                <h5 class="card-title">Card Title</h5>
                <h6 class="card-subtitle">Card Subtitle</h6>
                <p class="card-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos quis expedita vero ducimus nostrum obcaecati iure voluptatum qui fuga possimus quisquam esse quas hic sequi et aut tempora, magnam neque.
                </p>
                <div class="card-links">
                    <a href="3" class="bg-dark rounded-3 card-link-view card-link text-decoration-none">View</a>
                    <a href="3" class="card-link-help card-link text-decoration-none">Help</a>
                    <a href="3" class="card-link-share card-link text-decoration-none">
                        Share
                        <i class="bi bi-share"></i>
                    </a>
                </div>

            </div>

        </div>

        <div class="card col-sm-12 col-md-6 col-lg-4 my-3 border border-5">

            {{-- <img src="https://picsum.photos/50/50" alt="" class="card-img-top"> --}}
            <h4 class="card-header bg-secondary">Status</h4>

            <div class="card-body">

                <h5 class="card-title">Card Title</h5>
                <h6 class="card-subtitle">Card Subtitle</h6>
                <p class="card-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos quis expedita vero ducimus nostrum obcaecati iure voluptatum qui fuga possimus quisquam esse quas hic sequi et aut tempora, magnam neque.
                </p>
                <div class="card-links">
                    <a href="3" class="bg-dark rounded-3 card-link-view card-link text-decoration-none">View</a>
                    <a href="3" class="card-link-help card-link text-decoration-none">Help</a>
                    <a href="3" class="card-link-share card-link text-decoration-none">
                        Share
                        <i class="bi bi-share"></i>
                    </a>
                </div>

            </div>

        </div>
        -->

    </div>

</div>