<div class="mt-4">
    @foreach (App\Models\Glossary::getAllLetters() as $letter)
    <div class="ms-2"><h4>{{$letter}}</h4></div>
    <ul>
        @foreach (App\Models\Glossary::getAllTerms($letter) as $item)
        <li>
            <b>{{$item->term}}</b><br>{{$item->definition}} 
        </li>
        @endforeach
    </ul>
    @endforeach
</div>