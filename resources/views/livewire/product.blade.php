<div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h2 class="font-weight-bold mb-3">Daftar Barang</h2>

                    @if (session()->has('deletemessage'))
                    <div class="bg-gradient-to-r from-green-400 to-blue-500 border-l-4 border-black-500 text-white-700 p-1 mb-3 mt-3" role="alert">
                         <h5 class="text-white font-semibold">{{ session('deletemessage') }}</h5>
                    </div>
                     @endif

                    <table class="table table-bordered table-hovered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th width="20%">Gambar</th>
                                <th>Deskripsi</th>
                                <th>Jumlah Barang</th>
                                <th>Harga Barang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $index=>$product)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{$product->name}}</td>
                                <td><img src="{{ asset('storage/images/'.$product->image)}}" alt="product image" class="img-fluid"></td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->qty}}</td>
                                <td>{{$product->price}}</td>  
                                <td><button wire:click="delete({{ $product->id }})" type="button" class="btn btn-danger">Hapus</button></td>                              
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="font-weight-bold mb-3">Input Barang</h2>
                    <form wire:submit.prevent="store">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input wire:model="name" type="text" class="form-control">
                            @error('name') <small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="form-group">
                            <label>Gambar Barang</label>
                            <div class="custom-file">
                                <input wire:model="image" type="file" class="custom-file-input" id="customFile">
                                <label for="customFile" class='custom-file-label'>Choose Image</label>
                                @error('image') <small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            @if($image)
                                <label class="mt-2">Tampilan Gambar:</label>
                                <img src="{{$image->temporaryUrl()}}" class="img-fluid" alt="Preview Image">
                            @endif                            
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Barang</label>
                            <textarea wire:model="description" class="form-control"></textarea>
                            @error('description') <small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input wire:model="qty" type="number" class="form-control">
                            @error('qty') <small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input wire:model="price" type="number" class="form-control">
                            @error('price') <small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Submit Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>