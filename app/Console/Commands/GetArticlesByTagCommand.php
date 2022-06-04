<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Article;
use App\Models\Tag;
use Exception;

class GetArticlesByTagCommand extends Command{

    protected $signature = 'tag:count {tag} {--by=id} {--list}';
    protected $description = 'Вернуть статьи привязанные к тегу';
    
    public function handle(){
        if($this->option('by') == 'name'){
            try{
                $tag = Tag::where('name', $this->argument('tag'))
                    ->firstOrFail();
            }
            catch(Exception){
                $this->error('Не существует статей с таким названием');
                return 0;
            }
        }
        else{
            try{
                $tag = Tag::findOrFail($this->argument('tag'));
            }
            catch(Exception){
                $this->error('Не существует статей с таким id');
                return 0;
            }
        }
        $articles = $tag->articles;
        if($this->option('list')){
            foreach($articles as $article){
                $this->info('id: '.$article->id.' name: '.$article->name);
            }
        }
        $this->info('total: '.count($articles));
    }
}
