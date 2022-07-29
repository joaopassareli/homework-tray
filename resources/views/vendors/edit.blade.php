<x-layout title="Editar Vendedor - {!! $vendor->name !!}">

    <x-vendors.form
        :action="route('vendors.update', $vendor->id)"
        :name="$vendor->name"
        :email="$vendor->email"
        :update="true"
    />

</x-layout>
