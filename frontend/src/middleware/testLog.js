export default function testLog({
    to,
    next
}) {
    console.log(to.name)
    return next()
}