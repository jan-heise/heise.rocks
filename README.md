# HEISE.rocks

> A nice [Laravel](https://laravel.com/) based piece of web software.

## Technical setup

### Locale installation

1. Clone repo, access folder
    ```sh
    git clone git@github.com:jan-heise/heise.rocks.git heise && cd heise
    ```
2. Copy, rename and edit `.env` file
    ```sh
    cp .env.example .env
    ```
3. Copy .env file into the .ddev folder to give DDEV access to the variables
    ```
    cp .env .ddev
    ```
4. Start the DDEV container _(Keys from your `~/.ssh` directory are automatically added via the post-start hook)_
    ```sh
    ddev start
    ```
5. Run DDEV setup _(Composer, npm, build process)_
    ```sh
    ddev setup
    ```

### Build process

-   `ddev dev` to start the development server
-   `ddev build` to run the build process

### Utilities

-   `ddev update-composer` to update and bump composer packages
-   `ddev update-npm` to update NPM packages

## DDEV Links

| Service    | URL                      |
| :--------- |:-------------------------|
| web        | https://heise.local      |
| Mailhog    | https://heise.local:8026 |
