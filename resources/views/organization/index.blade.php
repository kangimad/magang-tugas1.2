<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        * {
            font-family: 'Bahnschrif' !important; //kalau ndk bisa tambah !important
        }
    </style>

    <title>Health Services - Client</title>
</head>

<body class="bg-light">

    {{-- @dd($data); --}}

    <div class="container pt-3">
        <div class="row">
            <div class="col">
                <h2 class="text-center">Health Service Client Side</h2>
            </div>
        </div>
    </div>
    <div class="container py-3">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Form input data</h4>
                    </div>
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <form method="post"
                            action="{{ Route::currentRouteName() == 'organization.index' ? route('organization.store') : route('organization.update', [$data['id']]) }}">
                            @csrf

                            @if (Route::currentRouteName() == 'organization.show' || Route::currentRouteName() == 'organization.edit')
                                @method('put')
                            @endif

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="code" class="fw-bold form-label">Code</label>
                                        <input type="text" class="form-control @error('code') is-invalid @enderror"
                                            id="code" name="code"
                                            value="{{ isset($data['code']) ? $data['code'] : old('code') }}">
                                        @error('code')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="name" class="fw-bold form-label">name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name"
                                            value="{{ isset($data['name']) ? $data['name'] : old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="group_id" class="fw-bold form-label">group_id</label>
                                        <select class="form-select @error('group_id') is-invalid @enderror"
                                            aria-label="Default select example" name="group_id">
                                            @if (isset($data['group_id']) && old('group_id' == $data['group_id']))
                                                <option value="{{ old('group_id') }}" selected>
                                                    {{ old('group_id') }} </option>
                                            @else
                                                @for ($i = 1; $i <= 9; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            @endif
                                        </select>
                                        @error('group_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="type_id" class="fw-bold form-label">type_id</label>
                                        <select class="form-select @error('type_id') is-invalid @enderror"
                                            aria-label="Default select example" name="type_id">
                                            @if (isset($data['type_id']) && old('type_id' == $data['type_id']))
                                                <option value="{{ old('type_id') }}" selected>
                                                    {{ old('type_id') }} </option>
                                            @else
                                                @for ($i = 1; $i <= 9; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            @endif
                                        </select>
                                        @error('type_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="class" class="fw-bold form-label">class</label>
                                        <input type="text" class="form-control @error('class') is-invalid @enderror"
                                            id="class" name="class"
                                            value="{{ isset($data['class']) ? $data['class'] : old('class') }}">
                                        @error('class')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="address" class="fw-bold form-label">Address</label>
                                        <input type="text"
                                            class="form-control @error('address') is-invalid @enderror" id="address"
                                            name="address"
                                            value="{{ isset($data['address']) ? $data['address'] : old('address') }}">
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="phone" class="fw-bold form-label">Phone</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                            id="phone" name="phone"
                                            value="{{ isset($data['phone']) ? $data['phone'] : old('phone') }}">
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="created_by" class="fw-bold form-label">created_by</label>
                                        <input type="text"
                                            class="form-control @error('created_by') is-invalid @enderror"
                                            id="created_by" name="created_by"
                                            value="{{ isset($data['created_by']) ? $data['created_by'] : old('created_by') }}">
                                        @error('created_by')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="province_id" class="fw-bold form-label">province_id</label>
                                        <select class="form-select @error('province_id') is-invalid @enderror"
                                            aria-label="Default select example" name="province_id">
                                            @if (isset($data['province_id']) && old('province_id' == $data['province_id']))
                                                <option value="{{ old('province_id') }}" selected>
                                                    {{ old('province_id') }} </option>
                                            @else
                                                @for ($i = 1; $i <= 9; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            @endif
                                        </select>
                                        @error('province_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="regency_id" class="fw-bold form-label">regency_id</label>
                                        <select class="form-select @error('regency_id') is-invalid @enderror"
                                            aria-label="Default select example" name="regency_id">
                                            @if (isset($data['regency_id']) && old('regency_id' == $data['regency_id']))
                                                <option value="{{ old('regency_id') }}" selected>
                                                    {{ old('regency_id') }} </option>
                                            @else
                                                @for ($i = 1; $i <= 9; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            @endif
                                        </select>
                                        @error('regency_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="district_id" class="fw-bold form-label">district_id</label>
                                        <select class="form-select @error('district_id') is-invalid @enderror"
                                            aria-label="Default select example" name="district_id">
                                            @if (isset($data['district_id']) && old('district_id' == $data['district_id']))
                                                <option value="{{ old('district_id') }}" selected>
                                                    {{ old('district_id') }} </option>
                                            @else
                                                @for ($i = 1; $i <= 9; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            @endif
                                        </select>
                                        @error('district_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="village_id" class="fw-bold form-label">village_id</label>
                                        <select class="form-select @error('village_id') is-invalid @enderror"
                                            aria-label="Default select example" name="village_id">
                                            @if (isset($data['village_id']) && old('village_id' == $data['village_id']))
                                                <option value="{{ old('village_id') }}" selected>
                                                    {{ old('village_id') }} </option>
                                            @else
                                                @for ($i = 1; $i <= 9; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            @endif
                                        </select>
                                        @error('village_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @if (Route::currentRouteName() == 'organization.index')
            <div class="row pt-3">
                <div class="col">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="align-middle" scope="col">#</th>
                                <th class="align-middle" scope="col">Code</th>
                                <th class="align-middle" scope="col">Name</th>
                                <th class="align-middle" scope="col">Class</th>
                                <th class="align-middle" scope="col">Address</th>
                                <th class="align-middle" scope="col">Phone</th>
                                <th class="align-middle" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = $data['from'];
                            @endphp
                            @foreach ($data['data'] as $item)
                                <tr>
                                    <th class="align-middle" scope="row">{{ $i++ }}</th>
                                    <td class="align-middle">{{ $item['code'] }}</td>
                                    <td class="align-middle">{{ $item['name'] }}</td>
                                    <td class="align-middle">{{ $item['class'] }}</td>
                                    <td class="align-middle">{{ $item['address'] }}</td>
                                    <td class="align-middle">{{ $item['phone'] }}</td>
                                    <td>
                                        <div class="d-flex align-middle">
                                            <a href="{{ route('organization.show', [$item['id']]) }}"
                                                class="btn btn-info mx-1 border-0"><i class="bi bi-tv"></i></a>
                                            <a href="{{ route('organization.edit', [$item['id']]) }}"
                                                class="btn btn-info mx-1 border-0">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('organization.destroy', [$item['id']]) }}"
                                                method="post" class="inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger mx-1 border-0"
                                                    onclick="return confirm('Are you sure ?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if ($data['links'])
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                @foreach ($data['links'] as $link )
                                <li class="page-item {{ $link['active'] ? 'active' : '' }}"><a class="page-link" href="{{ $link['new_url'] ?? $link['url'] }}">{!! $link['label'] !!}</a></li>
                                @endforeach
                            </ul>
                        </nav>
                    @endif

                </div>
            </div>
        @endif

    </div>


    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>
