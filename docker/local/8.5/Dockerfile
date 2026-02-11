FROM debian:trixie-slim

LABEL maintainer="Baraboshkin Oleg"

ARG WWWGROUP

WORKDIR /var/www/html

ENV DEBIAN_FRONTEND noninteractive
ENV TZ=UTC

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update \
    && apt-get install -y gnupg  \
    gosu  \
    curl

RUN apt-get install -y \
    zip  \
    unzip  \
    libcap2-bin  \
    dnsutils \
    lsb-release  \
    apt-transport-https \
    ca-certificates  \
    git  \
    supervisor \
    sqlite3  \
    graphviz  \
    libpng-dev

RUN apt-get install -y nodejs npm \
    && npm i -g npm \
    && npm i yarn

RUN curl -sSLo /tmp/debsuryorg-archive-keyring.deb https://packages.sury.org/debsuryorg-archive-keyring.deb \
    && dpkg -i /tmp/debsuryorg-archive-keyring.deb \
    && sh -c 'echo "deb [signed-by=/usr/share/keyrings/deb.sury.org-php.gpg] https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list'

RUN apt-get update \
    && apt-get install -y php8.5-cli \
    php8.5-dev \
    php8.5-pgsql  \
    php8.5-sqlite3  \
    php8.5-gd \
    php8.5-curl \
    php8.5-imap \
    php8.5-mysql  \
    php8.5-mbstring \
    php8.5-xml  \
    php8.5-zip \
    php8.5-bcmath \
    php8.5-intl \
    php8.5-readline \
    php8.5-ldap \
    php8.5-msgpack  \
    php8.5-igbinary \
    php8.5-redis  \
    php8.5-memcached \
    php8.5-xdebug \
    php8.5-pcov

RUN apt-get install -y composer
ENV PATH="~/.config/composer/vendor/bin:$PATH"

RUN apt-get -y autoremove \
    && apt-get clean

RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | gpg --dearmor | tee /etc/apt/keyrings/yarn.gpg >/dev/null \
    && echo "deb [signed-by=/etc/apt/keyrings/yarn.gpg] https://dl.yarnpkg.com/debian/ stable main" > /etc/apt/sources.list.d/yarn.list \
    && curl -sS https://www.postgresql.org/media/keys/ACCC4CF8.asc | gpg --dearmor | tee /etc/apt/keyrings/pgdg.gpg >/dev/null \
    && echo "deb [signed-by=/etc/apt/keyrings/pgdg.gpg] http://apt.postgresql.org/pub/repos/apt jammy-pgdg main" > /etc/apt/sources.list.d/pgdg.list \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN setcap "cap_net_bind_service=+ep" /usr/bin/php8.5

RUN groupadd --force -g $WWWGROUP sail
RUN useradd -ms /bin/bash --no-user-group -g $WWWGROUP -u 1337 sail

COPY start-container /usr/local/bin/start-container
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY php.ini /etc/php/8.5/cli/conf.d/99-sail.ini
RUN chmod +x /usr/local/bin/start-container

EXPOSE 8000
#CMD ["sh", "-c", "sleep infinity"]
ENTRYPOINT ["start-container"]
