<?php

namespace App\Policies;

use App\Article;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any articles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isGranted(User::ROLE_USER);

    }

    /**
     * Determine whether the user can view the articles.
     *
     * @param  \App\User  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function view(User $user, Article $article)
    {
        return $user->isGranted(User::ROLE_USER);


    }

    /**
     * Determine whether the user can create articles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isGranted(User::ROLE_USER);

    }

    /**
     * Determine whether the user can update the articles.
     *
     * @param  \App\User  $user
     * @param  \App\Article $article
     * @return mixed
     */
    public function update(User $user, Article $article)
    {
        return $user->isGranted(User::ROLE_USER) && $user->id === $article->user_id;
    }

    /**
     * Determine whether the user can delete the articles.
     *
     * @param  \App\User  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function delete(User $user, Article $article)
    {
        return $user->isGranted(User::ROLE_USER);

    }


}
