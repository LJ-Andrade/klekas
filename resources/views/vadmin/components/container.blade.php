<div class="row">
    <div class="card custom-card">
        @if($title != null)
            <div class="card-header">
                <div class="card-title" id="basic-layout-colored-form-control">{{ $title }}</div>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                    </ul>
                </div>
            </div>
        @endif
        <div class="card-body collapse in">
            <div class="card-block">
                {{ $content }}
            </div>
        </div>
    </div>
</div>