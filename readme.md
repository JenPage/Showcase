# Showcase

A Laravel package which adds the ability to create "showcases", or view boxes which contain cards of items. It also includes an admin panel to manage showcases, which can only be accessed by a logged-in Auth user.

> Still being developed!

## Todos:
    - get to 1.0
        - add the admin section
        - create components for dropping in the view boxes

## Install
```
git clone [the-url]
composer install
npm install
```

## Test Project
To create a test project:
`bash build-test-project.sh`

> This can also be used to rebuild the test project if you messed something up.

To update the test project with package changes:
`bash update-test-project.sh`

### Authentication
The test project generates Auth during the build. A default user is created with the test project:

> homestead
> secret

You will need this to access the Showcase admin panels, as they are secured behind the Auth middleware by default. This can be changed from the config file.