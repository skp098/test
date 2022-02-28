# 2. Use MediaWiki framework

Date: 2022-02-28

## Status

Accepted

## Context

MediaWiki is a scalable software and a feature-rich wiki. When a user submits an edit to a page, MediaWiki writes it to the database, but without deleting the previous versions of the page, thus allowing easy reverts in case of vandalism or spamming. MediaWiki can manage image and multimedia files, too, which are stored in the file system. For large wikis with lots of users, MediaWiki supports caching and can be easily coupled with proxy server software. With dedicated extensions, MediaWiki can also handle structured data. 

## Decision

Install MediaWiki using a docker-compose file to get started faster than installing Mysql and the Wiki itself.

## Consequences

- Easily start working with a fully functional mediawiki
- Will need to plan for devops for deploying in a test or prod environment.
