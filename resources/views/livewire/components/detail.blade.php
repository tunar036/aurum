<div class="col-lg-6">
    <div>
        <select wire:model="qty">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>
    <div wire:click="addToCart" class="button"><a href="#" class="fill-orange">Add to cart</a></div>
</div>