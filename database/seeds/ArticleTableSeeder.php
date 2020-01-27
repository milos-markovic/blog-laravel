<?php

use Illuminate\Database\Seeder;

use App\Article;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $art1 = [
            'title' => 'Eric Clapton',
            'content' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum minus laboriosam amet praesentium consectetur, atque commodi voluptatibus ex et maiores est eum inventore, corrupti in. Animi consequatur autem, pariatur at hic sapiente fugiat quos accusamus nobis nesciunt, ex, aliquam provident.',
            'img' => 'eric-big.jpg',
            'approve' => false,
            'user_id' => 1,
            'category_id' => 1 
        ];
        $art2 = [
            'title' => 'carlos santana',
            'content' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Architecto ipsum doloremque nemo itaque, laborum saepe. Quo eos hic corporis asperiores fugiat cum architecto culpa deleniti, alias quibusdam iste maiores sunt quos a velit ratione in exercitationem voluptas. Optio, commodi ipsa.',
            'img' => 'santana-big.jpg',
            'approve' => false,
            'user_id' => 1,
            'category_id' => 1 
        ];
        $art3 = [
            'title' => 'Jimi hendrix',
            'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam cum, fugiat, neque fuga at necessitatibus veritatis quia magnam cumque expedita eos nobis voluptatibus ducimus, inventore corrupti et dolor repellendus veniam doloremque? Earum enim vitae dicta labore distinctio voluptates ut maxime.',
            'img' => 'jimi_hendrix.jpg',
            'approve' => false,
            'user_id' => 1,
            'category_id' => 1 
        ];
        $art4 = [
            'title' => 'Vida Marković',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere quasi blanditiis commodi quo numquam deserunt obcaecati perferendis sint, illum veritatis optio omnis minima facilis vitae tenetur dolorum veniam sapiente. Facilis ad itaque necessitatibus ullam, voluptatibus possimus suscipit atque voluptate rem?',
            'img' => 'vida.jpg',
            'approve' => false,
            'user_id' => 1,
            'category_id' => 2 
        ];
        $art5 = [
            'title' => 'Vera Marković',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum officiis ratione architecto tempore nam aliquid maxime debitis illo! Suscipit, quae doloremque. Error eaque ipsum illum voluptatem mollitia? Sapiente, aut quo debitis unde, quisquam neque iure obcaecati, alias dicta molestiae maxime!',
            'img' => 'vera.jpg',
            'approve' => false,
            'user_id' => 1,
            'category_id' => 3 
        ];

        $article1 = Article::create($art1);
        $article2 = Article::create($art2);
        $article3 = Article::create($art3);
        $article4 = Article::create($art4);
        $article5 = Article::create($art5);
    }
}
