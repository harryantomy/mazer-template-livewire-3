<div>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="order-last mb-3 col-12 col-md-6 order-md-1">
                    <h3>Guru</h3>
                </div>
                <div class="order-first col-12 col-md-6 order-md-2">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Guru</a></li>
                            {{-- <li class="breadcrumb-item active" aria-current="page">Layout Default</li> --}}
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section" style="min-height: 70vh">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- button add --}}
                            <div class="mb-3 d-md-flex justify-content-md-between">
                                <button type="button" class="text-white btn btn-primary ">Tambah</button>
                            </div>

                            @livewire('components.table', [
                                'model' => App\Models\User::class,
                                'columns' => [
                                    'name' => 'Name',
                                    'email' => 'Email',
                                    'email_verified_at' => 'Email Verified At',
                                    'roles' => 'Roles',
                                ],
                                'searchColumns' => ['name', 'email'],
                                'sortColumn' => 'name',
                                'customColumns' => [
                                    // 'role' => [
                                    //     'value' => ['admin', 'user'],
                                    //     'class' => ['badge bg-light-success', 'badge bg-light-warning'],
                                    // ],
                                    'email' => [
                                        'class' => ['badge bg-light-success'],
                                    ],
                                ],
                                'withRelations' => ['roles'],
                            
                                'actions' => [
                                    'view' => [
                                        'event' => 'userViewed',
                                        'class' => 'btn-info',
                                        'icon' => 'bi bi-eye',
                                        'text' => 'View',
                                    ],
                                    'edit' => [
                                        'event' => 'userEdited',
                                        'class' => 'btn-primary',
                                        'icon' => 'bi bi-pencil',
                                        'text' => 'Edit',
                                    ],
                                    'delete' => [
                                        'event' => 'userDeleted',
                                        'class' => 'btn-danger',
                                        'icon' => 'bi bi-trash',
                                        'text' => 'Delete',
                                    ],
                                ],
                            ])



                        </div>
                    </div>
                </div>
        </section>
    </div>
</div>
