# KIDDIFY 

## CRONTAB

```
# staging
*/5 * * * *  /var/www/Symfony/app/console amara:sendVideos
*/30 * * * *  /var/www/Symfony/app/console registration:checkEnabled

# production:
*/5 * * * *  /var/www/prod/Symfony/app/console amara:sendVideos --env=prod
*/30 * * * *  /var/www/prod/Symfony/app/console registration:checkEnabled --env=prod
```