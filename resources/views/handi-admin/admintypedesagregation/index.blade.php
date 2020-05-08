<h1>Les Différentes désagrégations</h1>
@forelse($items as $item)
    
    <p>Définition: {{ $item->libelle }}</p>
    <p>Description: {{ $item->description }}</p>
    @empty
    <p>
        Rien a afficher
    </p>
@endforelse
{{$items->links()}}