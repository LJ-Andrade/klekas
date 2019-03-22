<div class="card" style="zoom: 1;">
    <div class="card-header">
        <h4 class="card-title">{{ $title }}</h4>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
				<div class="list-actions">
                    {{ $actions }}
                </div>
            </ul>
        </div>
    </div>
    <div class="card-body collapse in">
        <div class="table-responsive">
            <table id="TableList" class="table table-striped custom-list">
                <thead>
                    <tr>
                        {{ $tableTitles }}
                    </tr>
                </thead>
                <tbody>
                    {{ $tableContent }}
                </tbody>
            </table>
        </div>
    </div>
</div>