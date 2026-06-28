<x-form.add-form title="Update Collector" url="collector" button="Update Collector" :id="$collector->id">
    <x-form.form-input label="Name" name="name" :value="$collector->name" placeholder="Enter Name" required />

    <x-form.form-input label="Mobile number" name="mobile_number" :value="$collector->mobile_number" placeholder="Enter mobile number" />

    <x-form.form-input label="Nid" name="nid" :value="$collector->nid" placeholder="Enter nid" required />



    <x-slot name="sitecontent">
        <x-form.form-input label="Appointed By" name="appointed_by" :value="$collector->appointed_by" placeholder="Ex: Roni" />

        <x-imginputshow name="photo" :value="$collector->photo" title="Collector Image" size="2020 X 650px" />
    </x-slot>
</x-form.add-form>
