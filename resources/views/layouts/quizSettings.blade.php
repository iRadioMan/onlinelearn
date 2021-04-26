<div class="my-2">
    <form class="form-300px" method="POST" action="{{route('settings.save')}}">   
        @csrf     
        <label for="inputPercentage" class="form-label">
            Процент правильных ответов, необходимых для прохождения теста:
        </label>
        <input type="number" min="10" max="100" class="form-control" id="inputPercentage" name="acceptable_percentage"
            value="{{App\Models\AppSettings::where('name', 'acceptable_percentage')->first()->value}}">
        <button type="submit" class="btn btn-primary mt-4">Сохранить изменения</button>
    </form>
</div>