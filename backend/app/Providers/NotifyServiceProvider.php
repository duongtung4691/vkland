<?php
use Illuminate\Support\ServiceProvider;
class NotifyServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container
     * @return void
     */
    public function register()
    {
        $this->app->singleton('MailAdapter', function ($app) {
            return new Mailer();
        });
        $this->app->singleton('SmsAdapter', function($app) {
            return new Sms();
        });
        $this->app->singleton('Notify', function ($app) {
            //return new EmailOnly();// Nếu muốn gửi email thôi thì uncomment dòng này và comment dòng dưới
            //return new MailAndSms();
            return new SmsAddOn(new EmailOnly());//EmailAndSms
        });
        // binding
        // interface SocialPosting được inject vào trong FacebookClient
        $this->app->singleton('SocialPosting', function ($app) {
            //return new FacebookClient();
            return new TwitterAdapter(new TwitterClient);
        });
        //$this->app->bind('BookRepositoryInterface', 'BookRepository');
        $this->app->bind(BookRepositoryInterface::class, function ($app) {
            $bookRepo = new BookRepository(new Book());
            return new BookCacheRepository($bookRepo, $this->app['cache.store']);
        });
    }
}