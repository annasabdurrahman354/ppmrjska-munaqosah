<div class="relative w-full h-full py-40 min-h-screen">
    <div class="container mx-auto px-4 h-full">
        <div class="flex content-center items-center justify-center h-full">
            <div class="w-full lg:w-6/12 px-4">
                <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">
                    <div class="rounded-t mb-0 px-6 py-6">
                        <div class="text-center mb-3">
                            <h6 class="text-blueGray-500 text-xl font-bold">
                                {{ __('global.register') }}
                            </h6>
                        </div>
                        <hr class="mt-6 border-b-1 border-blueGray-300" />
                    </div>
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        <div @if($next) style="display:none"@endif >
                            <div class="relative w-full mb-3">
                                <label class="block text-blueGray-600 font-medium text-sm mb-2">
                                    Nama
                                </label>
                                <input wire:model.lazy="user.name" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('user.name') ? ' ring ring-red-300' : '' }}" placeholder="Nama" required autofocus autocomplete="name"/>
                                @error('user.name')
                                    <div class="text-red-500">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="relative w-full mb-3">
                                <label class="block text-blueGray-600 font-medium text-sm mb-2">
                                    Nomor Induk Santri
                                </label>
                                <input wire:model.lazy="user.nis" class="form-control border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('user.nis') ? ' ring ring-red-300' : '' }}" placeholder="Nomor induk santri" required/>
                                @error('user.nis')
                                    <div class="text-red-500">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="relative w-full mb-3">
                                <label class="block text-blueGray-600 font-medium text-sm mb-2">
                                    Nomor Telepon
                                </label>
                                <input wire:model.lazy="user.telepon" class="form-control border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('user.telepon') ? ' ring ring-red-300' : '' }}" placeholder="Nomor telepon dan WhatsApp" required/>
                                @error('user.telepon')
                                    <div class="text-red-500">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="relative w-full mb-3">
                                <label class="block text-blueGray-600 font-medium text-sm mb-2">
                                    {{ __('global.login_email') }}
                                </label>
                                <input wire:model.lazy="user.email" class="form-control border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('user.email') ? ' ring ring-red-300' : '' }}" placeholder="Email" required autocomplete="email"/>
                                @error('user.email')
                                    <div class="text-red-500">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="block text-blueGray-600 font-medium text-sm mb-2">Jenis Kelamin</label>
                                <select wire:model="user.jenis_kelamin" class="select-box w-full mr-2" id="user.jenis_kelamin" name="user.jenis_kelamin">
                                    <option value="" selected>Pilih jenis kelamin</option>
                                    @foreach($semuaJenisKelamin as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('user.jenis_kelamin')  
                                <div class="text-red-500">
                                    <small>{{ $message }}</small>
                                </div>
                                @enderror
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="block text-blueGray-600 font-medium text-sm mb-2">
                                    Angkatan PPM
                                </label>
                                <input wire:model.lazy="user.angkatan_ppm" class="form-control border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('user.angkatan_ppm') ? ' ring ring-red-300' : '' }}" placeholder="Angkatan PPM" required/>
                                @error('user.angkatan_ppm')
                                    <div class="text-red-500">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="relative w-full mb-3">
                                <label class="block text-blueGray-600 font-medium text-sm mb-2">
                                    Password
                                </label>
                                <input wire:model.lazy="password" type="password" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('password') ? ' ring ring-red-300' : '' }}" placeholder="Password" required autocomplete="new-password" />
                                @error('password')
                                    <div class="text-red-500">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="relative w-full mb-3">
                                <label class="block text-blueGray-600 font-medium text-sm mb-2">
                                    Konfirmasi Password
                                </label>
                                <input wire:model="konfirmasi_password" type="password" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Konfirmasi Password" required autocomplete="new-password" />
                                @error('konfirmasi_password')
                                    <div class="text-red-500">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-6">
                                <div class="flex items-center justify-between">
                                    <div>
                                        Sudah punya akun?
                                        <a href="{{ route('login') }}" class="underline text-md text-blueGray-600 hover:text-gray-400">
                                            {{ __('global.login') }}
                                        </a>
                                    </div>
                                    <button wire:click="next()" class="btn btn-indigo mr-2 text-base">Selanjutnya</button>
                                </div>
                            </div>
                        </div>

                        <div @if(!$next) style="display:none"@endif>
                            <div class="relative w-full mb-3">
                                <label class="block text-blueGray-600 font-medium text-sm mb-2">
                                    Universitas
                                </label>
                                <input wire:model.lazy="user.universitas" class="form-control border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('user.universitas') ? ' ring ring-red-300' : '' }}" placeholder="Universitas" required/>
                                @error('user.universitas')
                                    <div class="text-red-500">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="flex flex-row gap-x-4 mb-2">
                                <div class="flex-1">
                                <label class="block text-blueGray-600 font-medium text-sm mb-2">Program Studi</label>
                                    <input wire:model.lazy="user.prodi" class="form-control border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('user.prodi') ? ' ring ring-red-300' : '' }}" placeholder="Program studi" required/>
                                    <div class="help-block text-xs">
                                        Contoh: S1 Informatika
                                    </div>
                                    @error('user.prodi')
                                        <div class="text-red-500">
                                            <small>{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>
                                <div class="flex-2 ml-2">
                                    <label class="block text-blueGray-600 font-medium text-sm mb-2">Angkatan Kuliah</label>
                                    <input wire:model.lazy="user.angkatan_kuliah" class="form-control border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('user.angkatan_kuliah') ? ' ring ring-red-300' : '' }}" placeholder="Angkatan kuliah" required/>
                                    @error('user.angkatan_kuliah')
                                        <div class="text-red-500">
                                            <small>{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex flex-row gap-x-4 mb-1">
                                <div class="flex-1">
                                    <label class="block text-blueGray-600 font-medium text-sm mb-2">Provinsi</label>
                                    <select wire:model="provinsi" class="select-box w-full mr-2" id="provinsi" name="provinsi">
                                        <option value="" selected>Pilih provinsi</option>
                                        @foreach($semuaProvinsi as $prov)
                                            <option value="{{ $prov->id }}">{{ $prov->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('provinsi')  
                                    <div class="text-red-500">
                                        <small>{{ $message }}</small>
                                    </div>
                                    @enderror
                                </div>

                                @if ($provinsi != null)
                                    <div class="flex-1">
                                        <label class="block text-blueGray-600 font-medium text-sm mb-2">Kota/Kabupaten</label>
                                        <select wire:model="kabupaten" class="select-box w-full" id="kabupaten" name="kabupaten">
                                            <option value="" selected>Pilih kota/kabupaten</option>
                                            @foreach($semuaKabupaten as $kab)
                                                <option value="{{ $kab->id }}">{{ $kab->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('kabupaten')
                                        <div class="text-red-500">
                                            <small>{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div>
                                @endif
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="block text-blueGray-600 font-medium text-sm mb-2">
                                    Asal Daerah
                                </label>
                                <input wire:model.lazy="user.daerah" class="form-control border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('user.daerah') ? ' ring ring-red-300' : '' }}" placeholder="Asal daerah" required/>
                                @error('user.daerah')
                                    <div class="text-red-500">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="block text-blueGray-600 font-medium text-sm mb-2">
                                    Asal Desa
                                </label>
                                <input wire:model.lazy="user.desa" class="form-control border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('user.desa') ? ' ring ring-red-300' : '' }}" placeholder="Asal desa" required/>
                                @error('user.desa')
                                    <div class="text-red-500">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="block text-blueGray-600 font-medium text-sm mb-2">
                                    Asal Kelompok
                                </label>
                                <input wire:model="user.kelompok" class="form-control border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('user.kelompok') ? ' ring ring-red-300' : '' }}" placeholder="Asal kelompok" required/>
                                @error('user.kelompok')
                                    <div class="text-red-500">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="block text-blueGray-600 font-medium text-sm mb-2">Alamat Lengkap</label>
                                <input wire:model="user.alamat" class="form-control border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('user.alamat') ? ' ring ring-red-300' : '' }}" placeholder="Masukkan alamat lengkap" required/>
                                @error('user.alamat')
                                    <div class="text-red-500">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-6">
                                <div class="flex items-center justify-between">
                                     <button wire:click.prevent="back()" type="button" class="flex-none btn btn-secondary text-base">Kembali</button>
                                    <button wire:click.prevent="store()" type="button" class="flex-none btn btn-indigo mr-2 text-base">Daftar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>