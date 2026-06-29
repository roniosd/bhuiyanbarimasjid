<x-form.add-form title="Social Site Settings" action="socialUpdate" button="Update Social Settings" class="col-span-4">
    @foreach (json_decode($setting->social_links, true) as $key => $value)
        <x-form.form-input label="{{ ucfirst($key) }} Link" name="social_links[{{ $key }}]" type="url"
            :value="$value" placeholder="{{ ucfirst($key) }} Link" />
    @endforeach
</x-form.add-form>
