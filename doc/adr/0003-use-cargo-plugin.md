# 3. Use Cargo Plugin

Date: 2022-02-28

## Status

Accepted

## Context

Cargo is an extension to MediaWiki that provides a lightweight way to store and query the data contained within the calls to templates, such as infoboxes. It is similar in concept to the Semantic MediaWiki extension, but offers a number of advantages, including ease of installation and ease of use. 

## Decision

Cargo ties data storage directly to templates and stores the data in database tables based on those templates. This allows querying data via SQL snippets rather than SMWs dedicated query language. 

## Consequences


- Less flexible data model
- Small ecosystem
- Stability and quality issues

