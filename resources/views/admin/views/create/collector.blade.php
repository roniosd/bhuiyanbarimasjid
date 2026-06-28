<x-form.add-form title="Add Collector" url="collector" button="Add Collector">
    <x-form.form-input label="Name" name="name" placeholder="Enter Name" required />

    <x-form.form-input label="Mobile number" name="mobile_number" placeholder="Enter mobile number" />

    <x-form.form-input label="Nid" name="nid" placeholder="Enter nid" required />


    <x-slot name="sitecontent">

        <x-form.form-input label="Appointed By" name="appointed_by" placeholder="Ex: Roni" />

        <x-imginputshow name="photo" title="Collector Image" size="2020 X 650px" />
    </x-slot>
</x-form.add-form>
