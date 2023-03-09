@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('produit.update',['produit'=>$produit->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label>{{ __('liblle') }}</label>
                <div>
                    <input type="text" name="liblle" value="{{ $produit->liblle }}"
                        class="form-control mb-1 @error('liblle') is-invalid @enderror">
                </div>
                @error('liblle')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div>
                <label>{{ __('prix') }}</label>
                <div>
                    <input type="text" name="prix" value="{{ $produit->prix }}"
                        class="form-control mb-1 @error('prix') is-invalid @enderror">
                </div>
                @error('prix')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label>{{ __('type produit') }}</label>
            <div>
                <select name="type_produit_id" id=""  class="form-control mb-1 @error('type_produit_id') is-invalid @enderror">
                   @foreach ($type_produit as $p)
                        <option value="{{ $p->id }}">
                        {{ $p->liblle }}
                        </option>
                  @endforeach
                </select>
            </div>
            @error('type_produit_id')
            <div class="alert alert-danger text-danger">{{ $message }}</div>
            @enderror
          
        </div>

        <div>
            <label>{{ __('qtStock') }}</label>
            <div>
                <input type="text" name="qtStock" value="{{ $produit->qtStock }}"
                class="form-control mb-1 @error('qtStock') is-invalid @enderror">
            </div>
            @error('qtStock')
            <div class="alert alert-danger text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label>{{ __('image') }}</label>
            <img src="{{'../../uploads/'.$produit->image}}" alt="" style="width:150px;height:150px;">
            <div>
                <input type="file" name="image" value="change image">
                </div>
                @error('image')
                <div class="alert alert-danger text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label>{{ __('description') }}</label>
                <div>
                   <textarea name="description" id="description" cols="60" rows="2" placeholder="{{ $produit->description }}"></textarea>
                </div>
                @error('description')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <button class="btn btn-success mt-1" type="submit">Create</button>
        </form>
    </div>
    @endsection
    